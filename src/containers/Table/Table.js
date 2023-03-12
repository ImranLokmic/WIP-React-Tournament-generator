

const Table = (props) => {

  return (
    <>

            <td className="px-6 py-4">{props.ranking+1}</td>
            <td className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{props.player_name}</td>
            <td className="px-6 py-4">{props.player_points}</td>
    </>
  );
};

export default Table;
