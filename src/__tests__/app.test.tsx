import { render, screen } from '@testing-library/react';
import App from '../App';

describe('App', () => {
  it('renders the hero title in English by default', () => {
    render(<App />);
    expect(screen.getByRole('heading', { name: /where art meets light/i })).toBeInTheDocument();
  });
});
