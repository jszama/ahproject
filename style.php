<?php require("colourscheme.php");?>
<?php
header("Content-type: text/css; charset: UTF-8");
?>

@media screen{
    h1 {
        font-size: 22px;
    }

    body {
        font-size: 18px;
    }

    .navList {
        display:none;
    }

    .navbar {
        padding: 5px;
        margin: 0;
        background-color: var(--bgColor);
        color: white;
        border-bottom: 3px solid #000;
        font-size: 16px;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: var(--navColor);
    }

    li {
        display: inline;
    }

    li a {
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover {
        background-color: var(--mainColor);
    }
}

@media screen and (max-width: 800px) {
    h1 {
        font-size: 18px;
    }

    body {
        font-size: 14px;
    }
    
    .navList {
        display:inline;
    }

    .navbar {
        padding: 5px;
        margin: 0;
        background-color: var(--navColor);
        color: white;
        border-bottom: 3px solid #000;
        font-size: 16px;
    }

    ul {
        display:none;
    }
}

body {
    background-color: var(--bgColor);
    margin: 0;
    padding: 0;
}

.header {
    background-color: var(--bgColor);
    border-bottom: 3px solid #000;
    display: flex;
    flex-direction: row;
    justify-content: center;
    color: white;
    padding: 15px;
}

.title {
    width: 85%;
    flex-grow: 3;
    text-align: center;
    font-size: 24px;
    align-self: center;
}

.errorSpace {
    height: 4%;
    width: 4%;
}

.loginMain {
    display: flex;
    justify-content: center;
}

.loginForm {
    border: 3px solid #000;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    background-color: var(--secondaryColor);
    text-align: center;
    margin:1%;
    padding:1%;
    height: 15%;
    width: 10%;
    min-width:200px;
}

.registerMain {
    display: flex;
    justify-content: center;
}

.registerForm {
    border: 3px solid #000;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    background-color: var(--secondaryColor);
    text-align: center;
    margin:1%;
    padding:1%;
    height: 15%;
    width: 15%;
    min-width:200px;
}

.info {
    width: 15%;
    text-align: left;
    margin:0;
    min-width:100%;
}

.info h3 {
    font-size: 18px;
    margin:0;
    padding:10px 0 0 0;
}

.main {
    padding: 15px;
    background-color: var(--mainColor);
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.searchbar {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    padding: 5px;
    margin: 5px;
    border-bottom: 3px solid white;
    background-color: var(--searchColor);
    border-top-left-radius: 25px;
    border-top-right-radius: 25px;
}

.predisplay {
    background-color: var(--searchColor);
    margin: 50px;
    border-radius: 25px;
}

.display {
    display: flex;
    flex-direction: row;
    border: 3px solid #000;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    background-color: var(--displayColor);
    margin:25px;
    flex-wrap: wrap;
    justify-content: left;
}


.post {
    padding: 10px;
    margin: 15px;
    border: 1px solid #000;
	box-shadow: 10px 10px 8px black;
    border-radius: 25px;
    max-width:300px;
}

.post p {
    margin: 0;
    padding: 0;
    overflow-wrap: break-word;
}

.postHeader {
	padding:0;
	margin:0;
	text-align:center;
}

.postTitle {
	padding:5%;
}

.postQuality {
	padding:2%;
}

.display.update {
    align-items: center;
    align-self: center;
    justify-content: center;
    margin:0px;
    display: flex;
    flex-direction: column;
    min-width: 300px;
    min-height: 250px;
}

.predisplay.update {
    margin:0px;
}


.main.update {
    padding-top: 1%;
    padding-right: 40%;
    padding-bottom: 1%;
    padding-left: 40%;
    background-color: var(--mainColor)>;
    display: flex;
    flex-direction: column;
    justify-content: center;
    min-width:200px;
    min-height:200px;
}

.userinfo {
    margin-top: 3%;
    float:left;
    justify-content: left;
}

.updatewindow {
    margin: 5%;
    background-color: var(--bgColor);
    padding: 5%;
    min-width:150px;
    min-height:150px;
}

.updatewindow input{
    margin-top: 5%;
    text-align:center
}

.updatetitle{
    display: block;
    text-align: center;
}

.createPopup {
	display: flex;
    flex-direction: column;
	padding: 10px;
    margin: 15px;
    border: 3px solid #000;
    border-radius: 25px;
}

.emailForm {
    display: flex;
    flex-direction: column;
	padding: 10px;
    margin: 15px;
    border: 3px solid #000;
    border-radius: 25px;
    min-width:150px;
    max-width:300px;
    background:var(--bgColor);
}

.emailForm input{
    margin:12px;
}

.errors {
    visibility: hidden;
	color: red;
}