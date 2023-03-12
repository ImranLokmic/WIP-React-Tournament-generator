import React from 'react'
import {Link} from 'react-router-dom'
import { useState, useEffect } from "react";
import axios from "axios";
import $ from "jquery";

const Button = () => {
  const [users, setUsers] = useState([]);
  useEffect(() => {
    getUsers();
  }, []);
  function getUsers() {
    axios
      .get("http://localhost/atp-backend/displayweek.php")
      .then(function (response) {
        setUsers(response.data);
      });
  }

  function create(){
    $.ajax({
      type: "post",
      url: "http://localhost/atp-backend/createtournament.php",
    })
  }

  return (
    <>
    <h1 className='self-center mb-2 text-3xl font-extrabold text-gray-900 dark:text-white md:text-3xl lg:text-3xl'><span className="text-transparent bg-clip-text bg-gradient-to-r to-blue-200 from-blue-400">CURRENT WEEK: {users}</span></h1>
    <Link
    to="/tournament"
    onClick={create}
    className='self-center text-white bg-gradient-to-r from-blue-400 via-blue-400 to-blue-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-600 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-600/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 '>
      NEXT WEEK
    </Link>
    </>
  )
}

export default Button