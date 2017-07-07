import java.io.File;
import java.util.Scanner;
import java.util.Stack;

public class DFS_KUNDU {
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
				DFS_K d = new DFS_K(a);
				// b.work();
				d.trav(3);
			}

		} catch (Exception e) {
			System.out.println(e);
		}

	}

	public static class DFS_K {
		public int a[][];
		public Stack s = new Stack();
		public int visited[];

		public DFS_K(int a[][]) {
			this.a = a;
			visited = new int[this.a.length];
		}

		public void trav(int source) {
			s.push(source);
			System.out.print(source);
			while (!(s.isEmpty())) {
				// System.out.print("=> "+source);
				for (int c = 0; c < a.length; c++) {
					if (a[source][c] == 1 && visited[c] == 0) {
						// System.out.println(source +" and "+c);
						System.out.print("=> " + c);
						s.push(c);

						visited[c] = 1;
						visited[source] = 1;
						source = (int) s.peek();
						c = 0;
					}
				}
				source = (int) s.pop();
			}
		}

	}

}
