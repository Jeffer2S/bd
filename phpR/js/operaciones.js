class Operaciones
{
    constructor (valor1, valor2){
        this.valor1 = valor1;
        this.valor2 = valor2;
    }
    sumar(){
        return this.valor1 + this.valor2;
    }
    restar(){
        return this.valor1 - this.valor2;
        
    }
    multiplicar(){
        return this.valor1 * this.valor2;
    }
    dividir(){
        return this.valor1 / this.valor2;
    }

}
/*
function calcular(){
    var n1 = parseInt( document.getElementById("txtprimerN").value);
    var n2 = parseInt( document.getElementById("txtsegundoN").value);
    //var resul = n1+n2;
    var resul = new Operaciones(n1,n2);
    //window.alert(resul);
    document.getElementById("suma").innerHTML="La suma entre "+n1+" y "+n2+" es igual a: "+resul.sumar();
    document.getElementById("resta").innerHTML="La resta entre "+n1+" y "+n2+" es igual a: "+resul.restar();
    document.getElementById("multiplicacion").innerHTML="La multiplicacion entre "+n1+" y "+n2+" es igual a: "+resul.multiplicar();
    document.getElementById("division").innerHTML="La division entre "+n1+" y "+n2+" es igual a: "+resul.dividir();
}
*/

function calcularSuma(){
    var n1 = parseInt(document.getElementById("txtprimerNs").value);
    var n2 = parseInt(document.getElementById("txtsegundoNs").value);
    var resul = new Operaciones(n1, n2);
    document.getElementById("suma").innerHTML = "La suma entre " + n1 + " y " + n2 + " es igual a: " + resul.sumar();
}

function calcularResta(){
    var n1 = parseInt(document.getElementById("txtprimerNr").value);
    var n2 = parseInt(document.getElementById("txtsegundoNr").value);
    var resul = new Operaciones(n1, n2);
    document.getElementById("resta").innerHTML = "La resta entre " + n1 + " y " + n2 + " es igual a: " + resul.restar();
}

function calcularMultiplicacion(){
    var n1 = parseInt(document.getElementById("txtprimerNm").value);
    var n2 = parseInt(document.getElementById("txtsegundoNm").value);
    var resul = new Operaciones(n1, n2);
    document.getElementById("multiplicacion").innerHTML = "La multiplicacion entre " + n1 + " y " + n2 + " es igual a: " + resul.multiplicar();
}

function calcularDivision(){
    var n1 = parseInt(document.getElementById("txtprimerNd").value);
    var n2 = parseInt(document.getElementById("txtsegundoNd").value);
    var resul = new Operaciones(n1, n2);
    document.getElementById("division").innerHTML = "La division entre " + n1 + " y " + n2 + " es igual a: " + resul.dividir();
}