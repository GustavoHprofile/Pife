import java.io.File;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.List;
import java.util.Random;
import java.util.Scanner;

public class Sorteio {
    public static void main(String[] args) {
        String nomeArquivo = "pilha.json";

        try {
            // Lê o conteúdo do arquivo JSON
            String conteudo = lerArquivo(nomeArquivo);

            // Converte o conteúdo em uma lista de elementos
            List<Integer> listaElementos = converterJSONParaLista(conteudo);

            // Converte a lista em um vetor
            int[] vetor = converterListaParaVetor(listaElementos);

            // Imprime o vetor
            for (int elemento : vetor) {
                System.out.println(elemento);
            }

            // Sorteia um número aleatório do vetor
            Random random = new Random();
            int indiceSorteado = random.nextInt(vetor.length);
            int numeroSorteado = vetor[indiceSorteado];
            System.out.println("Número sorteado: " + numeroSorteado);

        } catch (FileNotFoundException e) {
            System.out.println("Arquivo não encontrado: " + e.getMessage());
        }
    }

    private static String lerArquivo(String nomeArquivo) throws FileNotFoundException {
        File arquivo = new File(nomeArquivo);
        Scanner scanner = new Scanner(arquivo);
        StringBuilder conteudo = new StringBuilder();

        while (scanner.hasNextLine()) {
            conteudo.append(scanner.nextLine());
        }

        scanner.close();

        return conteudo.toString();
    }

    private static List<Integer> converterJSONParaLista(String json) {
        List<Integer> lista = new ArrayList<>();

        // Remove os caracteres extras e separa os elementos
        String[] elementos = json.replaceAll("[\\[\\]\\s+]", "").split(",");

        // Adiciona os elementos na lista
        for (String elemento : elementos) {
            lista.add(Integer.parseInt(elemento));
        }

        return lista;
    }

    private static int[] converterListaParaVetor(List<Integer> lista) {
        int[] vetor = new int[lista.size()];

        // Converte a lista em um vetor
        for (int i = 0; i < lista.size(); i++) {
            vetor[i] = lista.get(i);
        }

        return vetor;
    }
}