const textarea = document.getElementById("textarea");

//Function to change font size
function fontFun(val) {
  let value = val.value;
  textarea.style.fontSize = value + "px";
}

//Function to make font bold
function BoldFun(val) {
  if (textarea.style.fontWeight === "bold") {
    textarea.style.fontWeight = "normal";
    val.classList.remove("active");
    document.getElementById("isBold").value = "0";
  } else {
    textarea.style.fontWeight = "bold";
    val.classList.add("active");
    document.getElementById("isBold").value = "1";
  }
}

//Function to make font italic
function italicFun(val) {
  if (textarea.style.fontStyle == "italic") {
    textarea.style.fontStyle = "normal";
    val.classList.remove("active");
    document.getElementById("isItalic").value = "0";
  } else {
    textarea.style.fontStyle = "italic";
    val.classList.add("active");
    document.getElementById("isItalic").value = "1";
  }
}

//Function to make font underline
function underlineFun(val) {
  if (textarea.style.textDecoration == "underline") {
    textarea.style.textDecoration = "none";
    val.classList.remove("active");
    document.getElementById("isUnderLine").value = "0";
  } else {
    textarea.style.textDecoration = "underline";
    val.classList.add("active");
    document.getElementById("isUnderLine").value = "1";
  }
}

//Function to align the text to the left
function alignTextLeftFun(val) {
  textarea.style.textAlign = "left";
  document.getElementById("align").value = "left";
}

//Function to align the text to the center
function alignTextCenterFun(val) {
  textarea.style.textAlign = "center";
  document.getElementById("align").value = "center";
}

//Function to align the text to the right
function alignTextRightFun(val) {
  textarea.style.textAlign = "right";
  document.getElementById("align").value = "right";
}

//Function to make the text uppercase
function upper_lower_Fun(val) {
  if (textarea.style.textTransform == "uppercase") {
    textarea.style.textTransform = "none";
    val.classList.remove("active");
    document.getElementById("isUpper").value = "0";
  } else {
    textarea.style.textTransform = "uppercase";
    val.classList.add("active");
    document.getElementById("isUpper").value = "1";
  }
}

//Function to delete the text
function deleteFun(val) {
  textarea.style.fontWeight = "normal";
  textarea.style.fontStyle = "normal";
  textarea.style.textDecoration = "none";
  textarea.style.textAlign = "left";
  textarea.style.textTransform = "capitalize";
  textarea.value = "";
}

//Function to change the text color
function colorFun(val) {
  let col = val.value;
  textarea.style.color = col;
}
