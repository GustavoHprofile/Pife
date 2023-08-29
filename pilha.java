import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

public class pilha {
    private List<String> cartas;

    public pilha() {
        cartas = new ArrayList<>();
    }

    public void adicionarCarta(String carta) {
        cartas.add(carta);
    }

    public String comprarCarta() {
        if (!cartas.isEmpty()) {
            int indiceUltimaCarta = cartas.size() - 1;
            String carta = cartas.get(indiceUltimaCarta);
            cartas.remove(indiceUltimaCarta);
            return carta;
        }
        return null; // Retorna null se a pilha estiver vazia
    }

    public void embaralhar() {
        Collections.shuffle(cartas);
    }

    public int tamanho() {
        return cartas.size();
    }
}