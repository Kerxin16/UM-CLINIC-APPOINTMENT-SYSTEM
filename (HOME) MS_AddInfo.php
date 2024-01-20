<?php
	$conn = mysqli_connect('localhost:3307','root','1234','um_healthcare_system') or die("Could not Connect My Sql");
	$Title='Home';
include_once("(1) NavBar(MS).php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<title>Text Editor</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
}

body {
	background: #c2d6d6;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
}

   /*Make whole document center*/
   .centered {
      padding: 0;  
      margin-left: 50px;  
      margin-right: 50px;  
      box-sizing: border-box;  
  }

  .headerCentered {
      text-align: center;
      position: relative;
	  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
    }


a {
	cursor: pointer;
}


.container {
	max-width: 1500px;
	width: 100%;
	background:  #f2f2f2;
	border-radius: 8px;
	overflow: hidden;
	border:2px solid #424b57;
	height:500px;
}
.toolbar {
	padding: 16px;
	background:  #a3c2c2;
	max-width: 1500px;
	width: 100%;
	border-radius: 8px;
	border:2px solid #424b57;
	border-bottom: none;

}

.toolbarPosition{

text-align: center;
position: relative;
font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
padding-left:200px;

}

.toolbar .head {
	display: flex;
	grid-gap: 10px;
	margin-bottom: 16px;
	flex-wrap: wrap;
}
.toolbar .head > input {
	max-width: 100px;
	padding: 6px 10px;
	border-radius: 6px;
	border: 2px solid #ddd;
	outline: none;
}
.toolbar .head select {
	background: #fff;
	border: 2px solid #ddd;
	border-radius: 6px;
	outline: none;
	cursor: pointer;
}
.toolbar .head .color {
	background: #fff;
	border: 2px solid #ddd;
	border-radius: 6px;
	outline: none;
	cursor: pointer;
	display: flex;
	align-items: center;
	grid-gap: 6px;
	padding: 0 10px;
}
.toolbar .head .color span {
	font-size: 14px;
}
.toolbar .head .color input {
	border: none;
	padding: 0;
	width: 26px;
	height: 26px;
	background: #fff;
	cursor: pointer;
}
.toolbar .head .color input::-moz-color-swatch {
	width: 20px;
	height: 20px;
	border: none;
	border-radius: 50%;
}
.toolbar .btn-toolbar {
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	grid-gap: 10px;
}
.toolbar .btn-toolbar button {
	background: #fff;
	border: 2px solid #ddd;
	border-radius: 6px;
	cursor: pointer;
	width: 40px;
	height: 40px;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 18px;
}
.toolbar .btn-toolbar button:hover {
	background: #f3f3f3;
}
#content {
	padding: 16px;
	outline: none;
	max-height: 50vh;
	overflow: auto;
}

 /* Back button*/
 .btn{
    background:#669999;
    color:black;
	font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
    font-size:20px;
    height:40px;
    border-radius: 100px;
    width:150px;
    cursor: pointer;
  }

  .btn:hover{
    background-color: #a8b1bd;
  color: #424b57;

  }

  /*Reminder */
.reminder{
	font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
  font-size: 20px;
  color:black;
  background-color:#d9f2e6; 
  border-radius:20px;
  border:1px solid #b30000;
  height:60px;
  display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
      width:1850px;

      position: absolute;
            left: 50%;
            transform: translate(-50%, 0%);
}

    </style>
</head>
<body>
	<br><br><br>
	<div class="centered">
	<form id="form" action="(HOME) MS_BackHomePage.php" method="post"  >
	<br>
  <button type="submit"   class="btn" name="back" id="back" style="        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:20px;border-radius: 100px;cursor: pointer; width:150px;">Back</button>
</form>
<br><br>
	  <!--Reminder-->
	  <div class="reminder" role="alert">
<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#b30000" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>&nbsp;&nbsp;&nbsp;Gentle Reminder: Only the latest 9 infomation will be shown in the homepage.
</div>

<br><br><br><br>
</div>

  		<div class="toolbarPosition">
		<div class="toolbar">
			<div class="head">
				<select onchange="formatDoc('formatBlock', this.value); this.selectedIndex=0;">
					<option value="" selected="" hidden="" disabled="">Format</option>
					<option value="h1">Heading 1</option>
					<option value="h2">Heading 2</option>
					<option value="h3">Heading 3</option>
					<option value="h4">Heading 4</option>
					<option value="h5">Heading 5</option>
					<option value="h6">Heading 6</option>
					<option value="p">Paragraph</option>
				</select>
				<select onchange="formatDoc('fontSize', this.value); this.selectedIndex=0;">
					<option value="" selected="" hidden="" disabled="">Font size</option>
					<option value="1">Extra small</option>
					<option value="2">Small</option>
					<option value="3">Regular</option>
					<option value="4">Medium</option>
					<option value="5">Large</option>
					<option value="6">Extra Large</option>
					<option value="7">Big</option>
				</select>
				<div class="color">
					<span>Color</span>
					<input type="color" oninput="formatDoc('foreColor', this.value); this.value='#000000';">
				</div>
				<div class="color">
					<span>Background</span>
					<input type="color" oninput="formatDoc('hiliteColor', this.value); this.value='#000000';">
				</div>
			</div>
			<div class="btn-toolbar">
				<button type="button" onclick="formatDoc('undo')"><i class='bx bx-undo' ></i></button>
				<button type="button" onclick="formatDoc('redo')"><i class='bx bx-redo' ></i></button>
				<button type="button" onclick="formatDoc('bold')"><i class='bx bx-bold'></i></button>
				<button type="button" onclick="formatDoc('underline')"><i class='bx bx-underline' ></i></button>
				<button type="button" onclick="formatDoc('italic')"><i class='bx bx-italic' ></i></button>
				<button type="button" onclick="formatDoc('strikeThrough')"><i class='bx bx-strikethrough' ></i></button>
				<button type="button" onclick="formatDoc('justifyLeft')"><i class='bx bx-align-left' ></i></button>
				<button type="button" onclick="formatDoc('justifyCenter')"><i class='bx bx-align-middle' ></i></button>
				<button type="button" onclick="formatDoc('justifyRight')"><i class='bx bx-align-right' ></i></button>
				<button type="button" onclick="formatDoc('justifyFull')"><i class='bx bx-align-justify' ></i></button>
				<button type="button" onclick="formatDoc('insertOrderedList')"><i class='bx bx-list-ol' ></i></button>
				<button type="button" onclick="formatDoc('insertUnorderedList')"><i class='bx bx-list-ul' ></i></button>
			</div>
		</div>
</div>
		
	<div class="container">
        <div id="content" contenteditable="true" spellcheck="false">
    </div>
</div>
<br>
<div class="headerCentered">
<button type="submit" class="btn" id="saveButton">Save</button>
</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>


<script>
function formatDoc(cmd, value=null) {
	if(value) {
		document.execCommand(cmd, false, value);
	} else {
		document.execCommand(cmd);
	}
}

const content = document.getElementById('content');

content.addEventListener('mouseenter', function () {
	const a = content.querySelectorAll('a');
	a.forEach(item=> {
		item.addEventListener('mouseenter', function () {
			content.setAttribute('contenteditable', false);
			item.target = '_blank';
		})
		item.addEventListener('mouseleave', function () {
			content.setAttribute('contenteditable', true);
		})
	})
})

document.getElementById('saveButton').addEventListener('click', function () {
    const content = document.getElementById('content').innerHTML;

    // Send the content to the server for saving
    fetch('(HOME) MS_AddInfoC.php', {
        method: 'POST',
        body: JSON.stringify({ content }),
        headers: {
            'Content-Type': 'application/json'
        },
    })
    .then(response => response.json())
    .catch(error => {
        console.error('Fetch error:', error);
    });
})

document.getElementById('saveButton').addEventListener('click', function () {
            alert('Content saved successfully!');
            const targetURL = '(HOME) MS_AddInfo.php';
            window.location.href = targetURL;

})
  </script>