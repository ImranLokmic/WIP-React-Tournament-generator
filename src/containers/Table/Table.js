

const Table = (props) => {

  return (
    <>

            <td className="px-6 py-4">{props.ranking+1}</td>
            <td className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{props.player_name}</td>
            <td className="px-6 py-4">{props.player_points}</td>
            <td className="px-6 py-4">{props.w1}</td>
            <td className="px-6 py-4">{props.w2}</td>
            <td className="px-6 py-4">{props.w3}</td>
            <td className="px-6 py-4">{props.w4}</td>
            <td className="px-6 py-4">{props.w5}</td>
            <td className="px-6 py-4">{props.w6}</td>
            <td className="px-6 py-4">{props.w7}</td>
            <td className="px-6 py-4">{props.w8}</td>
            <td className="px-6 py-4">{props.w9}</td>
            <td className="px-6 py-4">{props.w10}</td>
            <td className="px-6 py-4">{props.w11}</td>
            <td className="px-6 py-4">{props.w12}</td>
            <td className="px-6 py-4">{props.w13}</td>

    </>
  );
};

export default Table;
