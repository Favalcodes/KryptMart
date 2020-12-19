const Migrations = artifacts.require("UserRegistration");

module.exports = function (deployer) {
  deployer.deploy(UserRegistration);
};
