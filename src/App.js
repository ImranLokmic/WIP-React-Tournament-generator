
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import "./App.css";
import { Header, Ranking, Tournament } from "./components/index.js";

function App() {
  return (
    <Router>
      <Routes>
        <Route
          path="/"
          element={
            <div className="App container mx-auto p-2">
              <Header />
              <Ranking />
            </div>
          }
        ></Route>
        <Route
        path="/tournament"
        element={
          <div className="App container mx-auto p-2">
              <Header />
              <Tournament />
            </div>
        }>
        </Route>
      </Routes>
    </Router>
  );
}

export default App;
