// SPDX-License-Identifier: UNLICENSED
pragma solidity ^0.6.0;

contract UserRegistration {

    enum UserType {manufacturer, transporter, vendor, buyer }
    
    event newUser(uint id, string name, string description, UserType role);

    modifier checkRegistered(address _check) {
        require(alreadyRegistered[_check] == false, "You already have an account");
        _;
    }


    struct User{
        string name;
        string description;
        address userAccount;
        UserType role;
    }

    

    User[] public users;
    mapping (uint => address) profileToUser;
    mapping (address => uint) userToProfile;
    mapping (address => bool) alreadyRegistered;


    function addUser(string calldata _name, string calldata _description, UserType _role )  external checkRegistered(msg.sender) {
        
        users.push(User(_name,_description,msg.sender, _role));
        uint id = uint32(users.length - 1);
        profileToUser[id] = msg.sender;
        userToProfile[msg.sender] = id;
        alreadyRegistered[msg.sender] = true;
        emit newUser(id,_name,_description,_role);
    }
    
    function viewUser(uint _userId) public view returns(string memory, string memory, UserType ) {

        string memory _name = users[_userId].name;
        string memory _description = users[_userId].description;
        UserType _role = users[_userId].role;
       
        return(_name,_description,_role);
    }
    
    // function editUserDetails() {

    // }
}