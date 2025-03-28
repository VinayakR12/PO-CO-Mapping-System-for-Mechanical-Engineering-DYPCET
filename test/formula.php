<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Score Calculator</title>
</head>
<body>


<form id="scoreForm">
  <label for="input1">Option 1:</label>
  <select id="input1">
    <option value="yes">Yes</option>
    <option value="no">No</option>
  </select><br><br>
  
  <label for="input2">Option 2:</label>
  <select id="input2">
    <option value="yes">Yes</option>
    <option value="no">No</option>
  </select><br><br>
  
  <label for="input3">Option 3:</label>
  <select id="input3">
    <option value="yes">Yes</option>
    <option value="no">No</option>
  </select><br><br>
  
  <label for="input4">Option 4:</label>
  <select id="input4">
    <option value="yes">Yes</option>
    <option value="no">No</option>
  </select><br><br>
  
  <label for="input5">Option 5:</label>
  <select id="input5">
    <option value="yes">Yes</option>
    <option value="no">No</option>
  </select><br><br>
  
  <button type="button" onclick="calculateScore()">Calculate Score</button>
</form>

<p id="result"></p>

<script>
function calculateScore() {
  var input1 = document.getElementById("input1").value;
  var input2 = document.getElementById("input2").value;
  var input3 = document.getElementById("input3").value;
  var input4 = document.getElementById("input4").value;
  var input5 = document.getElementById("input5").value;
  
  var score = (input1 === "yes" ? 1 : 0) + 
              (input2 === "yes" ? 1 : 0) + 
              (input3 === "yes" ? 1 : 0) + 
              (input4 === "yes" ? 1 : 0) + 
              (input5 === "yes" ? 1 : 0);
  
  score = Math.round(score * 3 / 5);
  
  document.getElementById("result").innerHTML = "Score: " + score;
}
</script>

</body>
</html>
