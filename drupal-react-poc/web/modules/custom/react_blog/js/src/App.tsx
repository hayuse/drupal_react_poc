import List from './component/List';
import Details from './component/Details';
import { Box } from '@mui/joy';
import { ListProvider } from './contexts/ListProvider';

function App() {

  return (
    <ListProvider>
      <h2>React blog list</h2>
      <Box sx={{display: 'flex', height: '50vh', overflow: 'hidden', gap: '20px',}}>
        <List />
        <Details />
      </Box>
    </ListProvider>
  );
}

export default App;
