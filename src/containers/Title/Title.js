import React from 'react'
import {Link} from 'react-router-dom'

const Title = () => {
  return (
    <Link to="/"><h1 className="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span className="text-transparent bg-clip-text bg-gradient-to-r to-blue-200 from-blue-400">TOUR</span></h1></Link>
    
  )
}

export default Title