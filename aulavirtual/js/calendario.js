window.addEventListener("load", iniciarEvento);


function iniciarEvento() {

    console.log("iniciarEvento")
    document.getElementById("anterior").addEventListener("click", mesantes)
    document.getElementById("posterior").addEventListener("click", mesdespues)



    //Arrays de datos:
    meses=["ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"];
    lasemana=["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"]
    diassemana=["Lun","Mar","Mie","Jue","Vie","Sab","Dom"];

    //fecha actual
    hoy = new Date(); //objeto fecha actual
    diasemhoy = hoy.getDay(); //dia semana actual
    diahoy = hoy.getDate(); //dia mes actual
    meshoy = hoy.getMonth(); //mes actual
    annohoy = hoy.getFullYear(); //año actual

    // Elementos del DOM: en cabecera de calendario 
    tit=document.getElementById("titulos"); //cabecera del calendario
    ant=document.getElementById("anterior");
    pos=document.getElementById("posterior");
    // Elementos del DOM en primera fila
    f0=document.getElementById("fila0");

    // Definir elementos iniciales:
    mescal = meshoy; //mes principal
    annocal = annohoy //año principal

    //primera linea de tabla: días de la semana.
    function primeralinea() {
        for (i=0;i<7;i++) {
            celda0 = f0.getElementsByTagName("th")[i];
            celda0.innerHTML = diassemana[i]
        }
    }		

    //iniciar calendario:
    cabecera() 
    primeralinea()
    escribirdias()

    //Pie de calendario
    //pie=document.getElementById("fechaactual");
    //pie.innerHTML+=lasemana[diasemhoy]+", "+diahoy+" de "+meses[meshoy]+" de "+annohoy;
    //formulario: datos iniciales:
    //document.buscar.buscaanno.value = annohoy;
    

    //FUNCIONES de creación del calendario:
    //cabecera del calendario
    function cabecera() {
        tit.innerHTML = meses[mescal];
        mesant = mescal - 1; //mes anterior
        mespos = mescal + 1; //mes posterior
        if (mesant < 0) {
            mesant = 11;
        }
        if (mespos > 11) {
            mespos = 0;
        }
        /*ant.innerHTML = meses[mesant]
        pos.innerHTML = meses[mespos]*/
    }

    //rellenar celdas con los d&iacute;as
    function escribirdias() {

        //Buscar dia de la semana del dia 1 del mes:
        primeromes = new Date(annocal,mescal,"1") //buscar primer día del mes
        prsem = primeromes.getDay() //buscar d&iacute;a de la semana del día 1
        prsem--; //adaptar al calendario español (empezar por lunes)
        if (prsem==-1) {
            prsem=6;
        }

        //buscar fecha para primera celda:
        diaprmes = primeromes.getDate() 
        prcelda = diaprmes-prsem; //restar días que sobran de la semana
        empezar = primeromes.setDate(prcelda) //empezar= nº del tiempo UNIX, 1ª celda
        diames = new Date() //convertir en fecha
        diames.setTime(empezar); //diames=fecha primera celda.

        //escribir las fechas:
        for (i=1;i<7;i++) { //localizar fila
            fila=document.getElementById("fila"+i);
            for (j=0;j<7;j++) {
                midia = diames.getDate() 
                mimes = diames.getMonth()
                mianno = diames.getFullYear()
                celda = fila.getElementsByTagName("td")[j];
                celda.innerHTML = midia;
                celda.style.backgroundColor = "#3a3837";
                celda.style.color = "#EEEBEE";
                //domingos en rojo
                if (j==6) { 
                    celda.style.color = "#f11445";
                }
                //dias restantes del mes en gris	
                if (mimes != mescal) { 
                    celda.style.color = "#a0babc";
                }
                //destacar la fecha actual
                if (mimes == meshoy && midia == diahoy && mianno == annohoy ) { 
                    celda.style.backgroundColor = "#F4623A";
                    //celda.innerHTML = "<cite title='Fecha Actual'>" + midia + "</cite>";
                }
                //pasar al siguiente d&iacute;a
                midia = midia + 1;
                diames.setDate(midia);                                
            }
        }
    }

    function mesantes() {
        nuevomes = new Date()
        primeromes--;
        nuevomes.setTime(primeromes)
        mescal = nuevomes.getMonth()
        annocal = nuevomes.getFullYear()
        cabecera()
        escribirdias()
    }

    function mesdespues() {
        nuevomes = new Date()
        tiempounix = primeromes.getTime()
        tiempounix = tiempounix+(45*24*60*60*1000)
        nuevomes.setTime(tiempounix)
        mescal = nuevomes.getMonth()
        annocal = nuevomes.getFullYear()
        cabecera()
        escribirdias()
    }

}




//Tras cargarse la p&aacute;gina ...
//window.onload = function() {
    
//}

/*function actualizar() {
    mescal=hoy.getMonth();
    annocal=hoy.getFullYear(); 
    cabecera()
    escribirdias()
}*/