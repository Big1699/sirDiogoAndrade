window.addEventListener("load", () => {
  
    let SubRefType = document.getElementById("SubRefType");
    let SubRefValue = document.getElementById("SubRefValue");
    let days = document.getElementById("days");

    SubRefType.addEventListener("change", () => {
        if (SubRefType.value === "no_allowance") {
            SubRefValue.value = 0;
            days.value = 0;
            SubRefValue.disabled = true;
            days.disabled = true;
        } else {
            SubRefValue.disabled = false;
            days.disabled = false;
        }
    });

    days.addEventListener("change", () => {
       
        if (days.parentNode.querySelector("span")) {
            days.parentNode.querySelector("span").remove();
            days.style.border = "1px solid #000000";
        }
        if (days.value > 31 || days.value < 1) {
            days.style.border = "1px solid red";
            let span = document.createElement("span");
            span.innerHTML = " >=1<=31";
            span.style.color = "red";
            span.style.fontWeight = "bold";
            days.parentNode.appendChild(span);
        }
    });

    function irsTAX(SalaryBase) {
        let irs;
      
        if (SalaryBase <= 710) {
          return 0;
        } else if (SalaryBase > 710 && SalaryBase <= 1015) {
          irs = SalaryBase * 0.113;
          return irs;
        } else if (SalaryBase > 1015 && SalaryBase <= 1577) {
          irs = SalaryBase * 0.172;
          return irs;
        } else if (SalaryBase > 1577 && SalaryBase <= 2109) {
          irs = SalaryBase * 0.219;
          return irs;
        } else if (SalaryBase > 2109 && SalaryBase <= 5241) {
          irs = SalaryBase * 0.323;
          return irs;
        } else if (SalaryBase > 5241 && SalaryBase <= 11384) {
          irs = SalaryBase * 0.392;
          return irs;
        } else if (SalaryBase > 11384) {
          irs = SalaryBase * 0.438;
          return irs;
        }
      }
      
    
    

    function SubRefTypeAmount(SubRefType,SubRefValue,days){


        if(SubRefType =='no_allowance'){
            return 0;
        }else if(SubRefType =='money'){
            
            let dif = SubRefValue - 4.77;
    
            return dif*days;
        }else{

            let dif = SubRefValue - 7.637;
    
            return dif*days;
        }
    
    }

    function ssTAX(SalaryBase){


        let ss = SalaryBase * 0.11;
        return ss;
    }

    function Calculate() {
        
        let SalaryBase = +document.getElementById("SalaryBase").value;
        let SubRefType = document.getElementById("SubRefType").value;
        let SubRefValue = +document.getElementById("SubRefValue").value;
        let days = +document.getElementById("days").value;
        const result = SubRefTypeAmount(
            SubRefType,
            SubRefValue,
            days,
        );

        const resultirs= irsTAX(SalaryBase);
        const resultss = ssTAX(SalaryBase);
        const gross= SalaryBase + result;
        const LiquidSalary = result + SalaryBase-resultirs-resultss;

       
    
        document.getElementById("GrossSalary").textContent = gross;
        document.getElementById("SubRefValue").textContent =
            result;
        document.getElementById("resultirs").textContent =
        resultirs;
        document.getElementById("resultss").textContent =
        resultss;
        document.getElementById("LiquidSalary").textContent = LiquidSalary;
        
    }

    const bt_Calculate = document.getElementById("Calculate");
    bt_Calculate.addEventListener("click", Calculate);
});