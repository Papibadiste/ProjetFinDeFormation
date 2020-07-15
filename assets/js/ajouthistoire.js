function modifParagraphe() {
 
    if (document.getElementById('paragraphejs2').style.display == 'block') {
        document.getElementById('paragraphejs2').style.display = 'none';
        document.getElementById('btn2').style.display = 'none';
        document.getElementById('btn3').style.display = 'none';
        document.getElementById('btn1').style.display = 'block';
        document.getElementById("paragraphe2").value = "";
        document.getElementById("photop2").value = "";
    }
    else {
        document.getElementById('paragraphejs2').style.display = 'block';
        document.getElementById('btn2').style.display = 'block';
        document.getElementById('btn3').style.display = 'block';
        document.getElementById('btn1').style.display = 'none';

    }
};

function modifParagraphe2() {
    if (document.getElementById('paragraphejs3').style.display == 'block') {
    
        document.getElementById('paragraphejs3').style.display = 'none';
        document.getElementById('btn2').style.display = 'block';
        document.getElementById('btn3').style.display = 'block';
        document.getElementById('btn4').style.display = 'none';
        document.getElementById("paragraphe3").value = "";
        document.getElementById("photop3").value = "";
    }
    else {

  
        document.getElementById('paragraphejs3').style.display = 'block';
        document.getElementById('btn2').style.display = 'none';
        document.getElementById('btn3').style.display = 'none';
        document.getElementById('btn4').style.display = 'block';

    }

};
