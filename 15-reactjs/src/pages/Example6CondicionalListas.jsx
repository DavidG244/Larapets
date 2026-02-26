import { useState } from "react";
import BtnBack from "../components/BtnBack";
import "./Example6CondicionalListas.css";

function Example6CondicionalListas() {
  const initialList = [
    { id: 1, name: "Bulbasaur", type: "Grass", level: 3 },
    { id: 2, name: "Charmander", type: "Fire", level: 5 },
  ];

  const extraPool = [
    { id: 3, name: "Squirtle", type: "Water", level: 4 },
    { id: 4, name: "Pikachu", type: "Electric", level: 6 },
    { id: 5, name: "Eevee", type: "Normal", level: 2 },
    { id: 6, name: "Mewtwo", type: "Psychic", level: 10 },
  ];

  const [list, setList] = useState(initialList);
  const [nextIndex, setNextIndex] = useState(0);
  const [typeFilter, setTypeFilter] = useState("");
  const [minLevelFilter, setMinLevelFilter] = useState(false);

  const types = Array.from(new Set(list.map(p => p.type).concat(extraPool.map(p => p.type))));

  const handleAdd = () => {
    if (nextIndex >= extraPool.length) return;
    setList(prev => [...prev, extraPool[nextIndex]]);
    setNextIndex(prev => prev + 1);
  };

  const handleRemove = id => {
    setList(prev => prev.filter(p => p.id !== id));
  };

  const filtered = list.filter(p => {
    if (typeFilter && p.type !== typeFilter) return false;
    if (minLevelFilter && p.level < 4) return false;
    return true;
  });

  return (
    <div className="container">
      <BtnBack />
      <h2>Example 6 - Conditional Rendering & Lists</h2>
      <div className="controls">
        <label>
          type:
          <select
            className="filter-select filter-input"
            value={typeFilter}
            onChange={e => setTypeFilter(e.target.value)}
          >
            <option value="">all</option>
            {types.map(t => (
              <option key={t} value={t}>
                {t}
              </option>
            ))}
          </select>
        </label>
        <label className="checkbox-label">
          <input className="filter-checkbox"
            type="checkbox"
            checked={minLevelFilter}
            onChange={e => setMinLevelFilter(e.target.checked)}
          />
          level ≥ 4
        </label>
        <button
          onClick={handleAdd}
          className="add-button"
          disabled={nextIndex >= extraPool.length}
        >
          Agregar Pokémon
        </button>
      </div>
      <div className="pokemon-grid">
        {filtered.map(p => (
          <div key={p.id} className="pokemon-card">
            <div className="card-header">
              <span className="pokemon-name">{p.name}</span>
              <button className="delete-button" onClick={() => handleRemove(p.id)}>×</button>
            </div>
            <div className="card-body">
              <span className="pokemon-meta">Type: {p.type}</span>
              <span className="pokemon-meta">Level: {p.level}</span>
            </div>
          </div>
        ))}
        {filtered.length === 0 && <div className="empty-state">No hay pokemones que coincidan con los filtros</div>}
      </div>
    </div>
  );
}

export default Example6CondicionalListas;
