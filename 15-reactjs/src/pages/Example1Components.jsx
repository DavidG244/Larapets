import BtnBack from "../components/BtnBack";

//Component

function Gengar() {
    return (
        <div style={{border: '4px solid purple', padding: '1.4rem', borderRadius: '0.3rem', background: '#ec9fffff', width: '165px', }}>
            <h3>💜 Gengar</h3>
            <p>Type: Ghost</p>
            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/94.png" alt="Gengar" />
        </div>
    )
}

function Pikachu() {
    return (
        <div style={{border: '4px solid yellow', padding: '1.4rem', borderRadius: '0.3rem', background: '#ffec9fef', width: '165px', }}>
            <h3>⚡ Pikachu</h3>
            <p>Type: Electric</p>
            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png" alt="Pikachu" />
        </div>
    )
}

function Example1Components() {
    return (
        <div className="container">
            <BtnBack />
            <h2>Example 1: Components</h2>

            <p>Create independent a reusable UI pieces.</p>
            <div style={{display: 'flex', gap: '1rem', flexWrap: 'wrap', justifyContent: 'center', marginTop: '2rem'}}>
                <Gengar />
                <Pikachu />
            </div>
        </div>
    )
}

export default Example1Components;