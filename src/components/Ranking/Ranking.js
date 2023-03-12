import { Table } from "../../containers/index";
import { useState, useEffect } from "react";
import axios from "axios";

const Ranking = () => {
  const [users, setUsers] = useState([]);
  useEffect(() => {
    getUsers();
  }, []);
  function getUsers() {
    axios
      .get("http://localhost/atp-backend/rankings.php")
      .then(function (response) {
        setUsers(response.data);
      });
  }
  return (
    <div>
      <table className=" text-sm text-left text-gray-500 dark:text-gray-400">
        <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th className="px-6 py-3">Ranking</th>
            <th className="px-6 py-3">Player</th>
            <th className="px-6 py-3">Points</th>
          </tr>
        </thead>
        <tbody>
          
            {users.map((user, key) => (
              <tr className="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <Table
                key={user.player_id}
                ranking={key}
                player_name={user.player_name}
                player_points={user.player_points}
              />
              </tr>
            ))}

        </tbody>
      </table>
    </div>
  );
};

export default Ranking;
