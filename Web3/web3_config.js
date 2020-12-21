const Web3 = require("web3");
// require('dotenv').config({path:__dirname+'../.env'});
require('dotenv').config()

const provider = new Web3.providers.HttpProvider(process.env.BLOCKCHAINSERVER);
const web3 = new Web3(provider);

const userRegistration = process.env.USER_REGISTRATION;
const productCreation = process.env.PRODUCTION_CREATION;
const productTransportation = process.env.PRODUCT_TRANSPORATION;
const productSale = process.env.PRODUCT_SALE;

const userRegistrationABI = require("../build/contracts/UserRegistration.json");
const productCreationABI = require("../build/contracts/ProductCreation.json");
const productTransportationABI = require("../build/contracts/ProductTransportation.json");
const productSaleABI = require("../build/contracts/ProductSale.json");


const userRegistrationContract = new web3.eth.Contract(userRegistration, userRegistrationABI.abi);
const productCreationContract = new web3.eth.Contract(productCreation, productCreationABI.abi);
const productTransportationContract = new web3.eth.Contract(productTransportation, productTransportationABI.abi);
const productSaleContract = new web3.eth.Contract(productSale, productSaleABI.abi);

module.exports = {
    web3,
    userRegistrationContract,
    productTransportationContract,
    productSaleContract,
    productCreationContract
}
