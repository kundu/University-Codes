import java.util.*;

class Main {
	public static void main(String[] args) {

		readInput r = new readInput();
//		r.printFile();
		r.reading();

		ALforMap aj = new ALforMap();
		 System.out.println("The LIST\n");
//		 uncomment to see the list
		 aj.printAL(); 
		 
		 BFS b=new BFS();
	}
}
