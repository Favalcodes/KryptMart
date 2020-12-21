const {web3, productTransportationContract} = require('../Web3/web3_config');


  const
  const _form = document.getElementById("registerForm")
  if(_form){
    _form.addEventListener("submit-btn", async function(e){
        e.preventDefault();
  
        const firstName  = document.getElementById("firstName").value
        const lastName  = document.getElementById("lastName").value
        const description  = document.getElementById("email").value
        const role  = document.getElementById("role").value
        const userName = firstName +" "+ lastName
        let selectedRole
        switch (role) {
            case 'customer':
                selectedRole = 3
                break;
            case 'seller':
                selectedRole = 2
                break;
            case 'merchant':
                selectedRole = 3
                break;
            case 'manufacturer':
                selectedRole = 0
                break;
            default:
                break;
        }
  
        const account = localStorage.getItem("address")
        console.log(account)
        console.log(password)
        let login = await propertySale.methods.addUser(userName, description, selectedRole).call({from: account})
        console.log(login)
        if(login){
            e.submit()  
        }
      })
  }
  