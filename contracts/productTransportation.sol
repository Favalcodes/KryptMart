pragma solidity ^0.6.0;

import './productSale.sol';

contract ProductTransportation is ProductSale  {

    enum ProductCondition{perfect, damaged}

    struct TransportNote{
        ProductOrder order
        ProductTransportStatus transportStatus;
        ProductCondition condition;
        TransportService service;
        address transportedBy;
    }

    function productReciept() {

    }
    
}   
   
