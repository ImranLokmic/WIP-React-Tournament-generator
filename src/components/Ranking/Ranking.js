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
            <th className="px-6 py-3">1</th>
            <th className="px-6 py-3">2</th>
            <th className="px-6 py-3">3</th>
            <th className="px-6 py-3">4</th>
            <th className="px-6 py-3">5</th>
            <th className="px-6 py-3">6</th>
            <th className="px-6 py-3">7</th>
            <th className="px-6 py-3">8</th>
            <th className="px-6 py-3">9</th>
            <th className="px-6 py-3">10</th>
            <th className="px-6 py-3">11</th>
            <th className="px-6 py-3">12</th>
            <th className="px-6 py-3">13</th>
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
                w1={user.w1}
                w2={user.w2}
                w3={user.w3}
                w4={user.w4}
                w5={user.w5}
                w6={user.w6}
                w7={user.w7}
                w8={user.w8}
                w9={user.w9}
                w10={user.w10}
                w11={user.w11}
                w12={user.w12}
                w13={user.w13}

              />
              </tr>
            ))}

        </tbody>
      </table>
    </div>
  );
};

export default Ranking;
