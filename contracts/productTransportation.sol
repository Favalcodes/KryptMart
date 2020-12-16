// SPDX-License-Identifier: UNLICENSED
pragma solidity ^0.6.0;

import './productSale.sol';

contract ProductTransportation is ProductSale  {

    

    struct TransportNote{
        ProductOrder order;
        ProductTransportStatus transportStatus;
        ProductCondition condition;
        TransportService service;
        address transportedBy;
    }

    function productReciept()  internal{

    }
    
}   
   
