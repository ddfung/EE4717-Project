function computeTotal() {
    let itemQty = document.getElementById("quantity").value;
    let price = document.getElementById("itemPrice").value;
    console.log(price);
    let subtotal = 0;
    if (checkInput(itemQty)) { //only numerical inputs allowed
      subtotal = itemQty * price; //string*num = num, note doesnt work for +
      document.getElementById("itemCost").innerHTML = subtotal; //subtotal to javacost
    //   computeTotal();
    } else {
      alert("Input is invalid. Try again");
    //   document.getElementById("javaQty").value = "";
    //   document.getElementById("javaCost").innerHTML = "0";
    }
  }

function checkInput(string) {
return /^[0-9]*$/.test(string);
}