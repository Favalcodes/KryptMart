pragma solidity ^0.6.0;

import './productCreation.sol';

contract ProductSale is ProductCreation  {

    address payable recipient;

    enum ProductTransportStatus{awaitingPickUp,inTransit, delivered}
    enum ProductCondition{perfect, damaged}

    struct ProductOrder {
        VendorInventory orderedItem;
        uint quantity;
        uint cashPaid;
        address orderedBy;
        ProductTransportStatus transportStatus;
    }

    ProductOrder[] orders;
    mapping (uint => address) ordersMade;
    
    event newOrder(uint _id, string name, uint itemNumber, uint amountPaid, ProductTransportStatus orderStatus address new_owner);

    modifier rightPrice (uint _itemId, uint _quantity) {
        require(msg.value == _quantity.mul(vendorInventory[_itemId].price), "You have to input the right amount");
        _;
    }

    modifier _onSale(uint _itemId) {
        require(vendorInventory[_itemId].saleStatus == ProductSaleStatus.onSale, "Item is not on sale");
        _;
    }

    function orderProduct(uint itemID, uint quantity) payable external usersOnly _onSale(itemID) rightPrice(itemID, quantitiy) {
        require(quantitiy => 1, "You have not input a quantity");
        vendorRole = users[userToProfile[vendorInventory[_itemId].seller]].role;
        if (vendorRole == UserType.manufacturer ) {
            require(quantitiy => vendorInventory[itemID].minimumOrderQuantity, " Your order quantity is below the minimum order quantity" );
        }
        uint totalCharge = quantitiy.mul(vendorInventory[_itemId].price);
        orders.push( ProductOrder(vendorInventory[itemID], quantitiy, totalCharge, msg.sender, ProductTransportStatus.awaitingPickUp));
        uint id orders.length - 1;
        ordersMade[id] = msg.sender;
        emit newOrder(id, vendorInventory[itemID].item.name,quantitiy, totalCharge,order[id].transportStatus, msg.sender )

    }   

    function acknowledgeReciept(uint orderId ) external usersOnly returns(string memory) {
        require(msg.sender == orders[orderId].orderedBy);
        orders[orderId].transportStatus = ProductTransportStatus.delivered;
        return ('Delivered successfully')

    }
}    
   
