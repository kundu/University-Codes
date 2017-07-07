import java.util.*;

class Main {
	public static void main(String[] args) {

		readInput r = new readInput();
		r.reading();

		ALforMap aj = new ALforMap();
		// System.err.println("\nList is here");
		// uncomment to see the list
		// aj.printAL();

		BFS b = new BFS(r.getSOurce(), r.getSDestination());

	}
}
