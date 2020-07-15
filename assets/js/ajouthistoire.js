function ajouterParagraphe() {
    console.log("oui1");
    document.getElementById('paragraphejs2').style.display = 'block';
    document.getElementById('btn2').style.display = 'block';
    document.getElementById('btn3').style.display = 'block';
    document.getElementById('btn1').style.display = 'none';

};
function ajouterParagraphe2() {
    console.log("oui2");
    document.getElementById('paragraphejs3').style.display = 'block';
    document.getElementById('btn2').style.display = 'none';
    document.getElementById('btn3').style.display = 'none';
    document.getElementById('btn4').style.display = 'block';

};
function enleverParagraphe() {
    console.log("oui3");
    document.getElementById('paragraphejs2').style.display = 'none';
    document.getElementById('btn2').style.display = 'none';
    document.getElementById('btn3').style.display = 'none';
    document.getElementById('btn1').style.display = 'block';
    document.getElementById("paragraphe2").value = "";
    document.getElementById("photop2").value = "";

};
function enleverParagraphe2() {
    console.log("oui4");
    document.getElementById('paragraphejs3').style.display = 'none';
    document.getElementById('btn2').style.display = 'block';
    document.getElementById('btn3').style.display = 'block';
    document.getElementById('btn4').style.display = 'none';
    document.getElementById("paragraphe3").value = "";
    document.getElementById("photop3").value = "";

};
