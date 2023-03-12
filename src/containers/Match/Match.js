import { useState } from "react";
import $ from "jquery";

const Match = (props) => {
  const [data, setData] = useState({
    player_1_result: "",
    player_2_result: "",
  });

  const inputScore = () => {
    $.ajax({
      type: "post",
      url: "http://localhost/atp-backend/inputscore.php",
      data: {
        'match_id': props.match_id,
        'player_1':props.player_1,
        'player_2':props.player_2,
        'stage':props.tour_stage,
        'player_1_result': data.player_1_result,
        'player_2_result': data.player_2_result,
      },
      success: function() {   
        window.location.reload();  
    }
    });
  };

  return (
    <>
      <div className="grid grid-rows-2 grid-cols-3">
        <div className="self-center">
          Round: {props.tour_stage} Match: {props.match_id}
        </div>
        <div className="self-center">
          <label htmlFor={props.player_1 + props.match_id}>
            {props.player_1}
          </label>
        </div>
        <div className="self-center">
          <input
            onChange={(e) => {
              setData({ ...data, player_1_result: e.target.value });
            }}
            placeholder={props.player_1_result}
            type="number"
            id={props.player_1 + props.match_id}
            min="0"
            max="3"
          />
        </div>
        <div>
          <button
            onClick={inputScore}
            className="self-center text-white bg-gradient-to-r from-green-400 via-green-400 to-green-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-600 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-600/80 font-medium rounded-lg p-2 text-sm  text-center  "
          >
            SUBMIT SCORE
          </button>
        </div>
        <div className="self-center">
          <label htmlFor={props.player_2 + props.match_id}>
            {props.player_2}
          </label>
        </div>
        <div className="self-center">
          <input
            onChange={(e) => {
              setData({ ...data, player_2_result: e.target.value });
            }}
            placeholder={props.player_2_result}
            type="number"
            id={props.player_2 + props.match_id}
            min="0"
            max="3"
          />
        </div>
      </div>
      <br />
      {props.match_id === 24 ? <hr className="" /> : ""}
      {props.match_id === 40 ? <hr className="" /> : ""}
      {props.match_id === 48 ? <hr className="" /> : ""}
      {props.match_id === 52 ? <hr className="" /> : ""}
      {props.match_id === 54 ? <hr className="" /> : ""}
    </>
  );
};

export default Match;
