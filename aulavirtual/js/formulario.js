document.getElementById("formulario").addEventListener("submit", function(e){
    
    e.preventDefault()
    if(validarInputs()){
        this.submit()
        return false
    }
})

function validarInputs(){

    let bandera = true

    let nombre = document.getElementById("nombre") // no se permiten caracteres numéricos, primera letra mayúscula
    let apellidos = document.getElementById("apellidos") // no se permiten caracteres numéricos, primera letra mayúscula
    let telefono = document.getElementById("telefono") // no se permiten caracteres alfabéticos, 9 números
    let email = document.getElementById("email") // contenido + @ + contenido + . + es/com
    let contraseña = document.getElementById("contraseña") // 1 minúscula, 1 mayúscula, 1 número, mínimo 8 caracteres
    let repetirContraseña = document.getElementById("repetirContraseña") // misma contraseña

    let nombreValue = nombre.value.trim()
    let apellidosValue = apellidos.value.trim()
    let telefonoValue = telefono.value.trim()
    let emailValue = email.value.trim()
    let contraseñaValue = contraseña.value.trim()
    let repetirContraseñaValue = repetirContraseña.value.trim()
    
    let regexNombre = /^[A-Z][a-z]+$/  // /^(?!.* (?: |$))[A-Z][a-z ]+$/
    let regexApellidos = /\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+/
    let regexTelefono = /^\d{9}$/ // 9 números
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    let regexContraseña = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/ // 1 minúscula, 1 mayúscula, 1 número, mínimo 8 caracteres

    // NOMBRE
    if(nombreValue === ''){
        document.getElementById("errorNombre").innerHTML = "Este campo es obligatorio, por favor rellene para continuar."
        bandera = false
    }else if(!(regexNombre.test(nombreValue))){
        console.log("nombre no válido")
        document.getElementById("errorNombre").innerHTML = "Nombre no válido, <u>debe empezar por mayúscula y el resto de caracteres minúscula</u>."
        bandera = false
    }else{
        document.getElementById("errorNombre").innerHTML = ""
    }

    // APELLIDOS
    if(apellidosValue === ''){
        document.getElementById("errorApellidos").innerHTML = "Este campo es obligatorio, por favor rellene para continuar."
        bandera = false
    }else if(!(regexApellidos.test(apellidosValue))){
        console.log("apellidos no válido")
        document.getElementById("errorApellidos").innerHTML = "Apellidos no válidos, <u>deben ser 2 apellidos que empiecen por mayúscula y el resto de caracteres minúscula</u>."
        bandera = false
    }else{
        document.getElementById("errorApellidos").innerHTML = ""
    }

    // TELÉFONO
    if(telefonoValue === ''){
        document.getElementById("errorTelefono").innerHTML = "Este campo es obligatorio, por favor rellene para continuar."
        bandera = false
    }else if(!(regexTelefono.test(telefonoValue))){
        console.log("teléfono no válido")
        document.getElementById("errorTelefono").innerHTML = "No se permiten caracteres alfabéticos, <u>introduce 9 dígitos</u>."
        bandera = false
    }else{
        document.getElementById("errorTelefono").innerHTML = ""
    }

    // EMAIL
    if(emailValue === ''){
        document.getElementById("errorEmail").innerHTML = "Este campo es obligatorio, por favor rellene para continuar."
        bandera = false
    }else if(!(regexEmail.test(emailValue))){
        console.log("email no válido")
        document.getElementById("errorEmail").innerHTML = "El email debe ser del tipo: <u>contenido + @ + contenido + . + dominio</u>."
        bandera = false
    }else{
        document.getElementById("errorEmail").innerHTML = ""
    }

    // CONTRASEÑA
    if(contraseñaValue === ''){
        document.getElementById("errorContraseña").innerHTML = "Este campo es obligatorio, por favor rellene para continuar."
        bandera = false
    }else if(!(regexContraseña.test(contraseñaValue))){
        console.log("contraseña no válida")
        document.getElementById("errorContraseña").innerHTML = "La contraseña debe contener: <u>1 minúscula, 1 mayúscula, 1 número, mínimo 8 caracteres</u>."
        bandera = false
    }else{
        document.getElementById("errorContraseña").innerHTML = ""
    }

    // REPETIR CONTRASEÑA
    if((repetirContraseñaValue != contraseñaValue) || (repetirContraseñaValue === '')){
        document.getElementById("errorRepetirContraseña").innerHTML = "<u>La contraseña no coinciden o está vacía</u>, vuelve a intentarlo."
        bandera = false
    }else{
        document.getElementById("errorRepetirContraseña").innerHTML = ""
    }

    

    return bandera
}