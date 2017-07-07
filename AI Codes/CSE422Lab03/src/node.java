public class node {
	int decoded;
	int fitness;
	String chromosome;
	public node(int decoded, int fitness , String chromosome) {
		this.decoded = decoded;
		this.fitness = fitness;
		this.chromosome=chromosome;
	}
	
	public node(){
		
	}
	public void sort(node n[]) {
		for (int c = 0; c < n.length; c++) {
			for (int d = 0; d < n.length; d++) {
				if (n[d].fitness < n[c].fitness) {
					node swap = n[c];
					n[c]= n[d];
					n[d] = swap;
				}
			}
		}
	}
}
