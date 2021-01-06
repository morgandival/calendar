function selectday($i) {
  // remove classes from other elements
  Array.from(document.getElementsByClassName("selectedday")).forEach((el) => el.classList.remove("selectedday"));
  
  // add class to clicked element
  document.getElementById($i).classList.add("selectedday");
}