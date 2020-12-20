// SPDX-License-Identifier: UNLICENSED
pragma solidity ^0.6.0;

import "./userRegistration.sol";
import "@openzeppelin/contracts/math/SafeMath.sol";

contract ProductCreation is UserRegistration {
    using SafeMath for uint256;

    enum ProductSaleStatus {onSale, soldOut}

    struct Product {
        string name;
        string description;
        address createdBy;
    }

    struct TransportService {
        string name;
        string description;
        string provider;
        uint256 cost;
    }

    struct VendorInventory {
        Product item;
        uint256 price;
        uint256 minimumOrderQuantity;
        ProductSaleStatus saleStatus;
        address seller;
    }

    Product[] products;
    TransportService[] transportServices;
    VendorInventory[] vendorInventory;
    mapping(uint256 => address) productToCreator;
    mapping(uint256 => address) transportServicesToProvider;
    mapping(uint256 => address) inventory;

    event newProduct(uint256 _id, string name, string description);
    event newTransportService(
        uint256 _id,
        string _name,
        string _description,
        string _provider,
        uint256 _price
    );
    event newIventoryItem(
        uint256 _id,
        string itemName,
        string _vendor,
        uint256 _price,
        uint256 _moq
    );

    modifier usersOnly() {
        require(
            alreadyRegistered[msg.sender] == true,
            "Please regster into our site first"
        );
        _;
    }

    // modifier vendorAndManufacturerOnly () {
    //     assert(keccak256(abi.encodePacked((User[userToProfile[msg.sender]].role))) == keccak256(abi.encodePacked((UserType.manufacturer))) || keccak256(abi.encodePacked((User[userToProfile[msg.sender]].role))) == keccak256(abi.encodePacked((UserType.vendor))), "You have to be registered as a manufacturer or vendor to add a product");
    //     _;
    // }

    // modifier transportersOnly () {
    //     require(User[userToProfile[msg.sender]].role == UserType.transporter, "You have to be registered as a transporter to add a transport service");
    //     _;
    // }

    function addProduct(
        string calldata _name,
        string calldata _description,
        uint256 _price,
        uint256 _moq
    ) external usersOnly /*vendorAndManufacturerOnly*/
    {
        products.push(Product(_name, _description, msg.sender));
        uint256 id = products.length.sub(1);
        productToCreator[id] = msg.sender;
        emit newProduct(id, _name, _description);
        addInventoryItem(id, _price, _moq);
    }

    function addTransportService(
        string calldata _name,
        string calldata _description,
        uint256 _price
    ) external usersOnly /*transportersOnly*/
    {
        string memory providerName = users[userToProfile[msg.sender]].name;
        transportServices.push(
            TransportService(_name, _description, providerName, _price)
        );
        uint256 id = transportServices.length - 1;
        transportServicesToProvider[id] = msg.sender;
        emit newTransportService(id, _name, _description, providerName, _price);
    }

    function addInventoryItem(
        uint256 _productId,
        uint256 _price,
        uint256 _moq
    ) public usersOnly /*vendorAndManufacturerOnly*/
    {
        // uint _moq = 1;

        // if (keccak256(abi.encodePacked((User[userToProfile[msg.sender]].role) == keccak256(abi.encodePacked((UserType.manufacturer)))))) {
        //     _moq = 5;
        // }
        vendorInventory.push(
            VendorInventory(
                products[_productId],
                _price,
                _moq,
                ProductSaleStatus.onSale,
                msg.sender
            )
        );
        uint256 id = vendorInventory.length - 1;
        inventory[id] = msg.sender;
        emit newIventoryItem(
            id,
            products[_productId].name,
            users[userToProfile[msg.sender]].name,
            _price,
            _moq
        );
    }

    function viewInventoryItem(uint256 _id)
        public
        view
        returns (
            string memory,
            string memory,
            string memory,
            uint256,
            uint256,
            ProductSaleStatus
        )
    {
        string memory name = vendorInventory[_id].item.name;
        string memory _description = vendorInventory[_id].item.description;
        string memory _seller =
            users[userToProfile[vendorInventory[_id].seller]].name;
        uint256 _price = vendorInventory[_id].price;
        uint256 _moq = vendorInventory[_id].minimumOrderQuantity;
        ProductSaleStatus _saleStatus = vendorInventory[_id].saleStatus;
        return (name, _description, _seller, _price, _moq, _saleStatus);
    }
}
