const productTransportationAbi = [
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "_id",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "itemName",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "_vendor",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "_price",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "_moq",
          "type": "uint256"
        }
      ],
      "name": "newIventoryItem",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "_id",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "name",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "itemNumber",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "amountPaid",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "enum ProductSale.ProductTransportStatus",
          "name": "orderStatus",
          "type": "uint8"
        },
        {
          "indexed": false,
          "internalType": "address",
          "name": "new_owner",
          "type": "address"
        }
      ],
      "name": "newOrder",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "_id",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "name",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "description",
          "type": "string"
        }
      ],
      "name": "newProduct",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "_id",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "_name",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "_description",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "_provider",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "_price",
          "type": "uint256"
        }
      ],
      "name": "newTransportService",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "id",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "name",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "description",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "enum UserRegistration.UserType",
          "name": "role",
          "type": "uint8"
        }
      ],
      "name": "newUser",
      "type": "event"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "orderId",
          "type": "uint256"
        }
      ],
      "name": "acknowledgeReciept",
      "outputs": [
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        }
      ],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "_productId",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "_price",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "_moq",
          "type": "uint256"
        }
      ],
      "name": "addInventoryItem",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "string",
          "name": "_name",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_description",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "_price",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "_moq",
          "type": "uint256"
        }
      ],
      "name": "addProduct",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "string",
          "name": "_name",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_description",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "_price",
          "type": "uint256"
        }
      ],
      "name": "addTransportService",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "string",
          "name": "_name",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_description",
          "type": "string"
        },
        {
          "internalType": "enum UserRegistration.UserType",
          "name": "_role",
          "type": "uint8"
        }
      ],
      "name": "addUser",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "itemID",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "quantity",
          "type": "uint256"
        }
      ],
      "name": "orderProduct",
      "outputs": [],
      "stateMutability": "payable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "name": "users",
      "outputs": [
        {
          "internalType": "string",
          "name": "name",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "description",
          "type": "string"
        },
        {
          "internalType": "address",
          "name": "userAccount",
          "type": "address"
        },
        {
          "internalType": "enum UserRegistration.UserType",
          "name": "role",
          "type": "uint8"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "_id",
          "type": "uint256"
        }
      ],
      "name": "viewInventoryItem",
      "outputs": [
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        },
        {
          "internalType": "enum ProductCreation.ProductSaleStatus",
          "name": "",
          "type": "uint8"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "_userId",
          "type": "uint256"
        }
      ],
      "name": "viewUser",
      "outputs": [
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "enum UserRegistration.UserType",
          "name": "",
          "type": "uint8"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    }
  ];
  const productTransportationAddress = "0xf63942ccda0cde7c0b7e71a1b2c501b178706872";
  const web3 = new Web3(window.ethereum)
  const productTransportation = new web3.eth.Contract(
    productTransportationAbi,
      productTransportationAddress
  );

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
  