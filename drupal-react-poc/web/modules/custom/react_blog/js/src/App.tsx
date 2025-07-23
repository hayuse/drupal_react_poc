import {
  HashRouter,
  Route,
  Routes
} from "react-router-dom";
import List from './component/List';
import Details from './component/Details';

function App() {

  return (
    <div>
      <h1>React blog list</h1>
      <HashRouter>
        <Routes>
          <Route path='/' element={<List />} />
          <Route path='/details/:id' element={<Details />} />
        </Routes>
      </HashRouter>
    </div>
  );
}

export default App;
