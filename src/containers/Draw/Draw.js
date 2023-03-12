import {Match} from '../index'
import { useState, useEffect } from "react";
import axios from "axios";

const Draw = () => {
  const [users, setUsers] = useState([]);
  useEffect(() => {
    getUsers();
  }, []);
  function getUsers() {
    axios
      .get("http://localhost/atp-backend/displaymatches.php")
      .then(function (response) {
        setUsers(response.data);
      });
  }
  return (
    <>
      {users.map((user, key) => (
              <Match
                key={key}
                match_id={user.match_id}
                tour_stage={user.tournament_stage}
                player_1={user.player_1}
                player_2={user.player_2}
                player_1_result={user.player_1_result}
                player_2_result={user.player_2_result}
              />
            ))}
    </>
  );
};

export default Draw;
