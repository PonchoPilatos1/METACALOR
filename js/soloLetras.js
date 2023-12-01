function soloLetras(event){
    var letra = event.keyCode;
    if ((letra > 64 && letra < 91) || (letra > 96 && letra < 123) || (letra===8) || (letra===32)) {
        return true;
    } else {
        return false;
    }
}