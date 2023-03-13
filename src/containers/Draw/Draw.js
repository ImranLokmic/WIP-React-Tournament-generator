import { Match } from "../index";
import { useState, useEffect } from "react";
import axios from "axios";
import $ from "jquery";

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

  function save() {
    $.ajax({
      type: "post",
      url: "http://localhost/atp-backend/savetournament.php",
      success: function () {
        window.location.replace("http://localhost:3000");
      },
    });
  }
  return (
    <>
      <div className="grid grid-cols-6 grid-flow-col">
        {users.map((user, key) => (
          <Match
            key={key}
            lock={user.is_set}
            tour_id={user.tournament_id}
            match_id={user.match_id}
            tour_stage={user.tournament_stage}
            player_1={user.player_1}
            player_2={user.player_2}
            player_1_result={user.player_1_result}
            player_2_result={user.player_2_result}
            getUsers={getUsers}
            className={user.match_id < 25 ? 'col-start-1 ' : user.match_id>24 && user.match_id<41 ? 'col-start-2 ' : user.match_id>40 && user.match_id<49 ? 'col-start-3' : user.match_id>48 && user.match_id<53 ? 'col-start-4' : user.match_id>52 && user.match_id<55 ? 'col-start-5' : 'col-start-6' }
          />
        ))}
      </div>
      <button
        onClick={save}
        className="self-center text-white bg-gradient-to-r from-red-400 via-red-400 to-red-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-600 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-600/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 "
      >
        END TOURNAMENT
      </button>
    </>
  );
};

export default Draw;
