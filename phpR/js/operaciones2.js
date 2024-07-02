class Operaciones2 {
  #num1;
  #num2;
  constructor(num1, num2) {
    this.#num1 = num1;
    this.#num2 = num2;
  }

  sumar() {
    return this.#num1 + this.#num2;
  }
}

function Sumar() {
  let num1 = parseInt(document.getElementById("num1").value);
  let num2 = parseInt(document.getElementById("num2").value);
  let obj = new Operaciones2(num1, num2);
  let suma = obj.sumar();
  document.getElementById("resultado").innerHTML = "la suma es: " + suma;
}

// objeto simple

const persona = {
  nombre: "jefferson",
  edad: 25,
  ocupaciom: "Ingeniero",
  saludar: function () {
    const p = document.createElement("p");

    p.textContent = `Hola mi nombre es ${this.nombre} y soy ${this.ocupaciom}.`;

    const divSaludo = document.getElementById("saludo");

    if (divSaludo) {
      divSaludo.appendChild(p);
    } else {
      alert("error de saludo");
    }
  },
};

persona.saludar();

// objeto anidado

const prducto = {
  id: 101,
  nombre: "laptop",
  especificaciones: {
    procesador: "Intel i9",
    ram: "38BG",
    almacenamiento: "500GB SSD",
  },
  mostrarInfo: function () {
    let info = `id: ${this.id}, nombre: ${this.nombre} `;

    document.getElementById("info").innerHTML = info;
  },
};

console.log(prducto.especificaciones.ram);
console.log(prducto.especificaciones["ram"]);
console.log(prducto["especificaciones"]);
prducto.mostrarInfo();

// objeto con arreglo

const equipo = {
  nombre: "Desarrollo web",
  miembros: ["Ana", "Jefferson", "Luis", "jade"],

  listarMiembros: function () {
    let div = document.createElement("div");
    div.id = "lista";

    document.body.appendChild(div);

    this.miembros.forEach((miembro, index) => {
      let p = document.createElement("p");
      p.textContent = `${index} : ${miembro}`;
      div.appendChild(p);
    });
  },
};

equipo.miembros.push("Dayana");
equipo.listarMiembros();


// Función recursiva para calcular el enésimo número de Fibonacci
function fibonacciRecursive(n) {
    if (n <= 1) return n;
    return fibonacciRecursive(n - 1) + fibonacciRecursive(n - 2);
}


// Generar los primeros 10 números de la serie de Fibonacci
let fibSeries = [];
for (let i = 0; i < 20; i++) {
    fibSeries.push(fibonacciRecursive(i));
}
console.log(fibSeries); 


fibSeries.forEach((num,index)=>{
    let p = document.createElement("p")
    p.textContent=num
    document.body.appendChild(p)

})



function fibo(number){
    let a=0,b=1,c,s=1;
    console.log(a);
    for(i = 3; i<=number;i++){
      c=a+b;
      console.log(c);
      s = s +c;
      a =b;
      b=c;
    }
  }
  
  fibo(20)

  ///// factorial
  // Función recursiva para calcular el factorial de un número
function factorialRecursivo(n) {
    if (n < 0) {
        return "El factorial no está definido para números negativos.";
    }
    if (n === 0 || n === 1) {
        return 1;
    }
    return n * factorialRecursivo(n - 1);
}

// Ejemplo de uso
console.log(factorialRecursivo(20)); // Output: 120
//console.log(factorialRecursivo(5)); // Output: 120
//console.log(factorialRecursivo(0)); // Output: 1
//console.log(factorialRecursivo(-1)); // Output: El factorial no está definido para números negativos.
