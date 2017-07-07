import java.io.File;
import java.util.*;

public class BFS_KUNDU {
	private static int[][] a;

	public static void main(String[] args) {

		try {
			File f = new File("input.txt");
			Scanner k = new Scanner(f);

			while (k.hasNext()) {
				int n = k.nextInt();
				int m = k.nextInt();
				int[][] a = new int[n][n];
				while (k.hasNext()) {
					n = k.nextInt();
					m = k.nextInt();
					a[n][m] = 1;
					a[m][n] = 1;
				}

				for (int c = 0; c < a.length; c++) {
					for (int i = 0; i < a.length; i++)
						System.out.print(a[c][i] + " ");
					System.out.println();

				}
				System.out.println();
				BFS_k b = new BFS_k(a);
//				 b.work();
				b.trav(3);
			}

		} catch (Exception e) {
			System.out.println(e);
		}

	}

	public static class BFS_k {
		public int a[][];
		Queue<Integer> q = new LinkedList<Integer>();
		// Queue q ;
		public int visited[];

		public BFS_k(int a[][]) {
			this.a = a;
			// q=new Queue();
			visited = new int[this.a.length];
		}

		public void trav(int source) {
			Scanner k=new Scanner (System.in);
			int des=-1;
			System.out.println("if source and destination then press 1\n And source and travrsl then press 2");
			int check=k.nextInt();
			System.out.println("Give the source");
			source =k.nextInt();
			if(check==1)
			{
				System.out.println("Give the Destintn ");
				des=k.nextInt();
			}
			
			 
			q.add(source);
			// System.out.println(source);
			while (!(q.isEmpty())) {
				source = q.poll();
				System.out.print("=> " + source+" ");
				
				for (int c = 0; c < a.length; c++) {
//					System.out.print("LO " + a[source][c] + " ");
					if (a[source][c] == 1 && visited[c] == 0) {
						q.add(c);
						visited[source] = 1;
//						System.out.println("i jst add n q "+c);
//						System.out.println("pek " + q.peek());
						
						visited[c] = 1; 
						if(c==des)
						{
							System.out.print("=> " + c);
							q.clear();
							break;
						}
//						System.out.print("tr " + source+" ");
						// trav(c);
//						for(Integer s : q) { 
//							  System.out.println("i am n q "+s.toString()); 
//							}

					}
				}
//				System.out.println();
			}
		}

		public void work() {
			System.out.println();
			for (int c = 0; c < a.length; c++) {
				for (int i = 0; i < a.length; i++) {
					System.out.print(a[c][i] + " ");
				}
				System.out.println();
			}
		}

	}

}
