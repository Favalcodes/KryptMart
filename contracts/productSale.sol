pragma solidity ^0.6.0;

import './productCreation.sol';

contract ProductSale is ProductCreation  {

    address payable recipient;

    enum ProductTransportStatus{awaitingPickUp,inTransit, delivered}

    struct ProductOrder {
        Product orderedProduct;
        uint quantity;
        address orderedBy;
        ProductCondition condition;
        ProductTransportStatus transportStatus;
    }

    event newOrder(string name, uint256 amount, address new_owner);

    modifier rightPrice (uint _propertyId) {
        require(msg.value == properties[_propertyId].price, "You have to input the right amount");
        _;
    }

    modifier _inStock(uint _propertyId) {
        require(properties[_propertyId].status == SaleStatus.onSale, "Not for sale");
        _;
    }

    function orderProduct(uint productId) {

    }   

}    
   
