//for name restriction
function AlphabetSpace(string) {
    return /^[a-zA-Z ]+$/.test(string);
  }
  
  function validateName() {
    let nameInput = document.getElementById("customer_name").value;
    console.log(nameInput);
    if (AlphabetSpace(nameInput)) {
      console.log("Name input is accepted");
    } else {
      alert("Name input is invalid. Try again");
      document.getElementById("customer_name").value = ""; //to clear input
    }
  }
  
  //for email username restriction
  function AlphabetDotHyphen(string) {
    return /^[a-zA-Z0-9-.]+$/.test(string);
  }
  
  //for email domain to have only alphabets or . only
  function AlphabetDot(string) {
    return /^[a-zA-Z.]+$/.test(string);
  }

  function singaporeNumber(string){
    return /^[0-9]+$/.test(string);   
  }

  function checkQty(string) {
    return /^[0-9]*$/.test(string);
  }
  
  //for email domain to 2-4 extensions and last extension to have 2-3 characters
  function domainCheck(string) {
    if (!AlphabetDot(string)) {
      alert("Domain can only contain alphabets or period(.)");
      document.getElementById("email").value = "";
      return;
    }
    let domainExtArr = string.split("."); //still in array
    let domainExtArrLen = domainExtArr.length;
    if (
      domainExtArrLen >= 2 &&
      domainExtArrLen <= 4 && //for 2-4 extensions
      domainExtArr[0].length !== 0
    ) {
      //ensure domain input
      if (
        domainExtArr[domainExtArrLen - 1].length >= 2 && //2-3 char in last extension
        domainExtArr[domainExtArrLen - 1].length <= 3 
        // && domainExtArr[domainExtArrLen - 1] === 'com'
        )
         {
        return true;
      }
    }
    return false;
  }
  
  //for email validation
  function validateEmail() {
    const emailInput = document.getElementById("email").value;
    console.log(emailInput);
    if (emailInput.includes("@")) {
      emailInputArr = emailInput.split("@"); //split username and domain across @
      console.log(emailInputArr);
      if (
        AlphabetDotHyphen(emailInputArr[0]) &&
        domainCheck(emailInputArr[1])
      ) {
        console.log("Valid Email Input");
      } else if (AlphabetDotHyphen(emailInputArr[0]) === false) {
        alert("Username can only contain alphabets, hypen(-) and periods(.)");
        document.getElementById("email").value = ""; //clear email input
      } else if (emailInputArr.length === 1) {
        alert("Please include an @");
        document.getElementById("email").value = "";
      } else {
        alert("Invalid domain");
        document.getElementById("email").value = "";
      }
    } else {
      alert("Please include an @ followed by a domain name");
      document.getElementById("email").value = "";
    }
  }

  function validateContact(){
    let contactInput = document.getElementById("phone").value;
    // console.log(contactInput.length);
    if (singaporeNumber(contactInput)&& contactInput.length==8) {
        console.log("Contact input is accepted");
    } else {
      alert("Contact input is invalid. Try again");
      document.getElementById("phone").value = ""; //to clear input
    }
  }

  function validateQty(){
    let qtyInput = document.getElementById("qty_id").value;
    // console.log(contactInput.length);
    if (checkQty(qtyInput)) {
        console.log("Quantity input is accepted");
    } else {
      alert("Quantity input is invalid. Try again");
      document.getElementById("order_id").value = ""; //to clear input
    }
  }