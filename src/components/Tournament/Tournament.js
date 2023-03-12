import {Draw} from '../../containers/index'
import { useState, useEffect } from "react";
import axios from "axios";
import $ from "jquery";

const Tournament = () => {
  const [users, setUsers] = useState([]);
  useEffect(() => {
    getUsers();
  }, []);
  function getUsers() {
    axios
      .get("http://localhost/atp-backend/tournamentinfo.php")
      .then(function (response) {
        setUsers(response.data);
      });
  }
  function create(){
    $.ajax({
      type: "post",
      url: "http://localhost/atp-backend/createtournament.php",
      success: function() {   
        window.location.reload();  
    }
    })
  }
  return (
    <>
      <h1 className='text-4xl text-left font-medium text-gray-700 uppercase'>{users.tournament_name}</h1>
      <h1 className='text-2xl text-left font-medium text-gray-500 uppercase'>ATP {users.tournament_rating}</h1>
      <h1 className='text-2xl text-left font-medium text-gray-500 uppercase'>{users.tournament_surface}</h1>
      <button
      onClick={create}
      className='self-center text-white bg-gradient-to-r from-blue-400 via-blue-400 to-blue-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-600 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-600/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 '>
      GENERATE BRACKET
      </button>
      <hr className='m-4'/>
      <Draw/>
    </>
  )
}

export default Tournament