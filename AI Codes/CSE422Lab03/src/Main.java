import java.util.Arrays;

public class Main {
	static String chromosome[] = new String[6];
	static int decoded[] = new int[6];
	static int fitness[] = new int[6];
	static node n[] = new node[6];
	static node n2[] = new node[6];

	public static void main(String[] args) {
		try {
			for (int c = 0; c < n.length; c++) {
				n[c] = new node(0, 0, "");
				n2[c] = new node(0, 0, "");
			}
			Funcions f = new Funcions();
			for (int c = 0; c < 6; c++) {
				while (true) {
					String temp = f.getBinaryNumber(f.getRandomNumber());
					boolean b = true;
					for (int i = 0; i < c; i++) {
						if (chromosome[i].equals(temp)) {
							// System.err.println(temp+" is here");
							b = false;
							break;
						}
					}
					if (b) {
						chromosome[c] = temp;
						decoded[c] = Integer.parseInt(temp, 2);
						n[c].decoded = decoded[c];
						n[c].fitness = f.fitness(decoded[c]);
						n[c].chromosome = temp;
						break;
					}
				}
			}


			int count = 1;
			while (count <= 6) {
				node n1 = new node();
				n1.sort(n);

				for (int c = 0; c < chromosome.length; c++) {
					chromosome[c] = f.getBinaryNumber(decoded[c]);
				}
				System.out.println("Parents");
				for (int c = 0; c < n.length; c++) {
					System.out.println(n[c].chromosome + " : " + n[c].decoded
							+ " : " + n[c].fitness);
				}

				System.out.println();

				String temp0 = n[0].chromosome.substring(2, 4);
				String temp1 = n[1].chromosome.substring(2, 4);
				String temp2 = n[2].chromosome.substring(2, 4);
				String temp3 = n[3].chromosome.substring(2, 4);

				n2[0].chromosome = n[0].chromosome.substring(0, 2) + temp1;
				n2[1].chromosome = n[1].chromosome.substring(0, 2) + temp0;
				n2[2].chromosome = n[2].chromosome.substring(0, 2) + temp3;
				n2[3].chromosome = n[3].chromosome.substring(0, 2) + temp2;
				n2[4].chromosome = n[1].chromosome.substring(0, 2) + temp2;
				n2[5].chromosome = n[2].chromosome.substring(0, 2) + temp1;

				for (int i = 0; i < n2.length; i++) {
					n2[i].decoded = Integer.parseInt(n2[i].chromosome, 2);
					n2[i].fitness = f.fitness(n2[i].decoded);
				}
				
				System.out.println("After crossover");
				for (int c = 0; c < n2.length; c++) {
					System.out.println(n2[c].chromosome + " : " + n2[c].decoded
							+ " : " + n2[c].fitness);
				}
				System.out.println("\nMutation");

				n1.sort(n2);

				for (int c = 0; c < n2.length; c++) {
					System.out.println(n2[c].chromosome + " : " + n2[c].decoded
							+ " : " + n2[c].fitness);
				}
				
				n[4].chromosome = n2[0].chromosome;
				n[4].decoded = n2[0].decoded;
				n[4].fitness = n2[0].fitness;
				
				n[5].chromosome = n2[1].chromosome;
				n[5].decoded = n2[1].decoded;
				n[5].fitness = n2[1].fitness;
				
				count++;
				System.out.println();
			}

		} catch (Exception e) {
			System.err.println(e.toString());
		}
	}
}
