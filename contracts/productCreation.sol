pragma solidity ^0.6.0;

import './userRegistration.sol';
import 'github.com/OpenZeppelin/zeppelin-solidity/contracts/math/SafeMath.sol';

contract ProductCreation is UserRegistration  {    
   
    using SafeMath for uint;

    enum ProductSaleStatus{ onSale, soldOut}
    


    struct Product {
        string name;
        string description; 
        address createdBy;
    }

    struct TransportService {
        string name;
        string description;
        string provider;
        uint cost;
    }
    
    struct VendorInventory {
       Product item;
       uint price;
       uint minimumOrderQuantity;
       ProductSaleStatus saleStatus;
       address seller; 
    }

    Product[]  products;
    TransportService[] transportServices;
    VendorInventory[] vendorInventory;
    mapping (uint => address) productToCreator;
    mapping (uint => address) transportServicesToProvider;
    mapping (uint => address) inventory;
   
    event newProduct(uint _id, string name, string description);
    event newTransportService(uint _id, string _name, string _description, string _provider, uint _price);
    event newIventoryItem(uint _id, string itemName, string _vendor, uint _price, uint _moq);


    modifier usersOnly() {
        require(alreadyRegistered[msg.sender] == true, "Please regster into our site first");
        _;
    } 

    modifier vendorAndManufacturerOnly () {
        require(User[userToProfile[msg.sender]].role == UserType.manufacturer || User[userToProfile[msg.sender]].role == UserType.vendor, "You have to be registered as a manufacturer or vendor to add a product");
        _;
    }
    
    modifier transportersOnly () {
        require(User[userToProfile[msg.sender]].role == UserType.transporter, "You have to be registered as a transporter to add a transport service");
        _;
    } 

    function addProduct(string calldata _name, string calldata _description uint _price) external usersOnly vendorAndManufacturerOnly {

        products.push(Product(_name, _description, msg.sender ));
        uint id = properties.length - 1;
        productToCreator[id] = msg.sender;
        emit newProduct(id, _name, _description, msg.sender);
        addInventoryItem(id, _price);

    }

    function addTransportService(string calldata _name, string calldata _description,uint _price) external usersOnly transportersOnly {
        string providerName = User[userToProfile[msg.sender]].name;
        transportServices.push(TransportService(_name, _description, providerName, _price ));
        uint id = transportServices.length - 1;
        transportServicesToProvider[id] = msg.sender;
        emit newTransportService(id, _name, _description, providerName, _price);

    }

    function addInventoryItem(uint _productId, uint _price) public usersOnly vendorAndManufacturerOnly {

        uint _moq = 1;        

        if (User[userToProfile[msg.sender]].role == UserType.manufacturer) {
            _moq = 5;
        } 
        vendorInventory.push(VendorInventory(products[_productId], _price, _moq, ProductSaleStatus.onSale, msg.sender));
        uint id = vendorInventory.length - 1;
        inventory[id] = msg.sender;
        emit newIventoryItem(id, products[_productId].name,  User[userToProfile[msg.sender]].name, _price, _moq );

    }
    
    function viewInventoryItem(uint _id) view public returns(string memory,string memory) {
          
        string memory name = vendorInventory[_id].item.name;
        string memory _description = vendorInventory[_id].item.description;
        string  memory _seller = User[userToProfile[vendorInventory[_id].seller]].name;
        uint _price = vendorInventory[_id].price;
        uint _moq = vendorInventory[_id].minimumOrderQuantity;
        ProductSaleStatus _saleStatus = vendorInventory[_id].saleStatus;
       
    }
}

