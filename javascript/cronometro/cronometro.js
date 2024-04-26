/*Script que crea un cronómetro analógico funcional mendiante Canvas*/
class Cronometro {
    constructor(id, radio) {
        this.id = id;
        let lienzo = document.getElementById(id);
        this.posX = lienzo.offsetLeft;
        this.posY = lienzo.offsetTop;
        this.alto = parseInt(window.getComputedStyle(lienzo).height);
        this.ancho = parseInt(window.getComputedStyle(lienzo).width);
        this.lapiz = lienzo.getContext("2d");
        this.radio = radio;
        this.angulo = 0;
        this.timer = null;
        this.fondo = null;
        this.btnAlto = Math.round(0.15 * this.radio);
        this.btnAncho = Math.round(0.15 * this.radio);
        this.anchoDivisiones = Math.round(0.02 * this.radio);
        this.bordeEsfera = Math.round(radio / 30);
        //Traslada el centro al centro del canvas
        this.lapiz.translate(this.alto / 2, this.ancho / 2);
        lienzo.addEventListener("click", this.pulsarBtn.bind(this));
    }
    /*Pone una division de tiempo
    angulo: donde se coloca la división
    largo: tamaño de la marca
    txt: si lleva valor de tiempo
    */
    divisiones(angulo, largo, txt) {
        let lapiz = this.lapiz;
        let radio = this.radio - this.bordeEsfera;
        let oX, oY, fX, fY;
        angulo = this.anguloRads(angulo);
        oX = radio * Math.cos(angulo);
        oY = radio * Math.sin(angulo);
        fX = (radio - largo) * Math.cos(angulo);
        fY = (radio - largo) * Math.sin(angulo);
        lapiz.beginPath();
        lapiz.moveTo(oX, oY);
        lapiz.lineTo(fX, fY);
        lapiz.lineWidth = this.anchoDivisiones;
        lapiz.strokeStyle = "red";
        lapiz.stroke();
        if (txt.length > 0) {
            fX = (radio - 2 * largo) * Math.cos(angulo);
            fY = (radio - 2 * largo) * Math.sin(angulo);
            let size = Math.round(this.radio / 10) + 'px';
            this.texto(txt, fX, fY, "normal " + size + " Arial");
        }
    }
    /*Dibuja la esfera del cronómetro y un punto central, eje de la aguja  */
    circulo() {
        let lapiz = this.lapiz;
        let radio = this.radio;
        lapiz.beginPath();
        lapiz.arc(0, 0, radio, 0, 2 * Math.PI);
        lapiz.strokeStyle = "red";
        lapiz.lineWidth = 0;
        //coloca un efecto en la esfera para darle aspecto de relieve
        let grad = lapiz.createRadialGradient(0, 0, this.radio - this.bordeEsfera, 0, 0, this.radio);
        grad.addColorStop(0, "white");
        grad.addColorStop(0.2, "red");
        grad.addColorStop(0.4, "white");
        grad.addColorStop(1, "red");
        lapiz.fillStyle = grad;
        lapiz.fill();
        //Dibuja un circulo central
        lapiz.beginPath();
        lapiz.arc(0, 0, 10, 0, 2 * Math.PI);
        lapiz.lineWidth = 1;
        lapiz.fillStyle = "black";
        lapiz.fill();
        lapiz.stroke();
    }
    /*Dibuja el botón de inicio
    Relleno de gradiente
    estado 0:normal 1:pulsado
    */
    btnInicio(estado = 0) {
        let alto = this.btnAlto;
        let ancho = this.btnAncho;
        let oX = -ancho / 2;
        let oY = -(this.radio + alto);
        /*Relleno de botones con un gradiente para darle un cierto efecto*/
        let grad = this.lapiz.createLinearGradient(oX, oY, oX + ancho, oY);
        grad.addColorStop(0, "black");
        grad.addColorStop(0.2, "blue");
        grad.addColorStop(0.8, "blue");
        grad.addColorStop(1, "white");
        /*Guardo el estado actual*/
        this.lapiz.save();
        this.lapiz.fillStyle = grad;
        this.lapiz.globalCompositeOperation = "destination-over";
        if (estado == 1) {
            //borra segmento superior del botón (pulsado)        
            this.lapiz.clearRect(oX, oY, ancho, 10);
        } else {
            this.lapiz.fillRect(oX, oY, ancho, alto);
        }
        this.lapiz.globalCompositeOperation = "source-over";
        /*Recupero el estado anterior*/
        this.lapiz.restore();
    }
    /*Dibuja el botón de reset
    Relleno de gradiente
    estado 0:normal 1:pulsado
    Este botón está girado apoyado en un lateral del cronómetro
    */
    btnReset(estado = 0) {
        let alto = this.btnAlto;
        let ancho = this.btnAncho;
        let angulo = this.anguloRads(60);
        let oX = -ancho / 2;
        let oY = -(this.radio + alto);
        this.lapiz.save();
        /*Relleno de botones con un gradiente para darle un cierto efecto*/
        let grad = this.lapiz.createLinearGradient(oX, oY, oX + ancho, oY);
        grad.addColorStop(0, "black");
        grad.addColorStop(0.2, "gray");
        grad.addColorStop(0.8, "gray");
        grad.addColorStop(1, "white");
        this.lapiz.fillStyle = grad;
        this.lapiz.rotate(angulo);
        if (estado == 1) {
            ancho += 2;
            this.lapiz.clearRect(--oX, --oY, ancho, 10);
        } else {
            this.lapiz.fillRect(oX, oY, ancho, alto);
        }
        this.lapiz.restore();
    }
    /*
    Situa un texto en la esfera del cronómetro
    */
    texto(txt, pX, pY, font = "normal 25px Arial") {
        let lapiz = this.lapiz
        lapiz.font = font;
        lapiz.textAlign = "center";
        lapiz.textBaseline = "middle";
        lapiz.fillStyle = "black";
        lapiz.fillText(txt, pX, pY);
    }
    /* Dibuja el secundero como linea desde el centro a la división de tiempo
    El largo de la linea es 90% del radio
    */
    secundero() {
        let fX, fY;
        let angulo = this.anguloRads(this.angulo);
        fX = (this.radio * 0.9) * Math.cos(angulo);
        fY = (this.radio * 0.9) * Math.sin(angulo);
        this.lapiz.beginPath();
        this.lapiz.save();
        this.lapiz.shadowBlur = 8;
        this.lapiz.shadowOffsetX = 4;
        this.lapiz.shadowOffsetY = 4;
        this.lapiz.shadowColor = "#333";
        this.lapiz.moveTo(0, 0);
        this.lapiz.lineTo(fX, fY);
        this.lapiz.lineWidth = 4;
        this.lapiz.strokeStyle = "black";
        this.lapiz.stroke();
        this.lapiz.restore();
    }
    /*
    dibuja el cronómetro completo
    */
    dibujar() {
        let long, txt;
        let lapiz = this.lapiz;
        this.btnInicio();
        this.btnReset();
        this.circulo();
        /*Pone las divisiones alrededor de la esfera 
        La esfera son 360º y se divide en 60 divisiones (segundos)
        Cada división es 360/60 = 6 grados.
        Cada 5 segundos (5*6 = 30 grados) se pone una marca más larga y se escribe el valor.
        */
        for (let ang = 0; ang < 360; ang += 6) {
            long = this.bordeEsfera + 3;
            txt = '';
            if (ang % 30 == 0) {
                long = long * 2;
                txt = ang / 6 + "";
            }
            this.divisiones(ang, long, txt);
        }
        let size = Math.round(this.radio / 15) + 'px';
        this.texto("Made in CreaTuWeb", 0, -this.radio / 2, "normal " + size + " Arial");
        //Se guarda el cronómetro (sin secundero)
        this.fondo = lapiz.getImageData(0, 0, 2 * this.ancho, 2 * this.alto);
        this.secundero();
    }
    /*
    Pulsar un botón
    Inicio: inicia o para el cronómetro
    Reset: reinicia todo
    */
    pulsarBtn() {
        let x, y
        let ancho = this.btnAncho, alto = this.btnAlto;
        //posición del evento en relación al Canvas
        x = event.pageX - this.posX;
        y = event.pageY - this.posY;
        let obj = this;
        this.lapiz.beginPath();
        //boton inicio
        this.lapiz.rect(-ancho / 2, -(this.radio + alto), ancho, alto);
        //Animación botón Inicio: dibuja pulsado y tras 200ms lo dibuja normal
        if (this.lapiz.isPointInPath(x, y)) {
            this.btnInicio(1);
            //está funcionando lo detiene, si no lo inicia  
            if (this.timer != null) {
                setTimeout(() => this.btnInicio(0), 200);
                clearInterval(this.timer);
                this.timer = null;
            } else {
                setTimeout(() => this.animar(0), 200);
            }
        } else {
            //Boton reset:
            let oX = -this.btnAncho / 2;
            let oY = -(this.radio + alto);
            let angulo = this.anguloRads(60);
            this.lapiz.save();
            this.lapiz.rotate(angulo);
            this.lapiz.beginPath();
            this.lapiz.rect(oX, oY, ancho, alto);
            this.lapiz.restore();
            //Se dibuja presionado
            if (this.lapiz.isPointInPath(x, y)) {
                this.btnReset(1);
                if (this.timer != null) {
                    clearInterval(this.timer);
                    this.timer = null;
                }
                this.angulo = 0;
                //Reinicia el dibujo tras 200ms para animación
                setTimeout(() => {
                    this.lapiz.putImageData(this.fondo, 0, 0);
                    this.secundero()
                }, 200)
            }
        }
    }
    /*
    Anima el secundero para que avance una divisón cada segundo
    Cuando llega a los 60 seg. se reinicia la propiedad angulo
    */
    animar() {
        this.lapiz.putImageData(this.fondo, 0, 0);
        this.angulo = this.angulo + 6;
        this.secundero();
        if (this.angulo > 354) {
            clearInterval(this.timer);
            this.angulo = 0;
        }
        if (this.timer == null) {
            this.timer = setInterval(() => this.animar(), 1000);
        }
    }
    /*Convierte angulos a rdianes y pone el origen 0º en la vertical*/
    anguloRads(angulo) {
        let angrads = (angulo - 90) * Math.PI / 180;
        return angrads.toFixed(4);
    }
}
/*El conometro se crea con dos argumentos
id del canvas 
tamaño: radio de la esfera 
*/
let cronometro = new Cronometro("cronometro", 250);
cronometro.dibujar();