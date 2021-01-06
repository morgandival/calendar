function selectday($i) {
  // check for selectedday class
  if (document.getElementById($i).classList.contains("selectedday")) {
    // remove class if present
    document.getElementById($i).classList.remove("selectedday");
  } else {
    // add class if absent
    document.getElementById($i).classList.add("selectedday");
  }
}