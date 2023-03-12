import {Draw} from '../../containers/index'
import { useState, useEffect } from "react";
import axios from "axios";

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
  return (
    <>
      <h1 className='text-4xl text-left font-medium text-gray-700 uppercase'>{users.tournament_name}</h1>
      <h1 className='text-2xl text-left font-medium text-gray-500 uppercase'>ATP {users.tournament_rating}</h1>
      <h1 className='text-2xl text-left font-medium text-gray-500 uppercase'>{users.tournament_surface}</h1>
      <hr className='m-4'/>
      <Draw/>
    </>
  )
}

export default Tournament