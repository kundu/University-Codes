import java.io.File;
import java.io.FileNotFoundException;
import java.util.Scanner;

public class Knapsack {
	public static int weight[];
	public static int value[];
	public static Scanner k;
	public static int total;
	public static int capacity;
	public static int main[][];

	public static void main(String[] args) {
		readFile();
		knapsack();
		findItems();
	}

	public static void knapsack() {
		int a[][] = new int[capacity + 1][total + 1];

		for (int v = 1; v < a.length; v++) {
			for (int w = 1; w <= total; w++) {
				// System.out.println("wt "+weight[v-1]);
				// System.out.println("i m "+w);
				if (weight[v - 1] > w) {
					a[v][w] = Math.max(a[v - 1][w], a[v][w - 1]);
				} else {
					int temp = w - weight[v - 1];
					// System.out.println("temp "+temp);
					temp = a[v - 1][temp] + value[v - 1];
					int te = Math.max(a[v][w - 1], temp);
					a[v][w] = Math.max(a[v - 1][w], te);
				}
				// System.out.println("hahah "+a[v-1][w-1]);
			}
			main = a;

		}

//		for (int v = 0; v < a.length; v++) {
//			for (int w = 0; w <= total; w++) {
//				System.out.print(a[v][w] + " ");
//			}
//			System.out.println();
//		}

		System.out.println(a[a.length - 1][a[0].length - 1]);

	}

	public static void findItems() {
		int c = main.length - 1;
		int r = main[0].length - 1;
		String s = "";
		// System.out.println(main[c][r]);

		while (main[c][r] != 0) {
			if (main[c][r] == main[c][r - 1]) {
				r--;
				//System.out.println("col "+c);
			} else if (main[c][r] == main[c - 1][r]) {
				c--;
//				System.out.println("row "+r);
			} else {
				s = c-1+" "+s ;
				//System.out.println("itm " + s);

				int temp = main[c][r] - value[c - 1];
				//System.out.println("tem " + temp);
				c--;
				for (int i = 1; c < main[c].length; i++) {
					if (main[c][i] == temp) {
						r = i;
						//	System.out.println(r+" r "+main[c][r]);
						break;
					}
				}
			}
		}

		System.out.println( s);

	}

	public static void readFile() {
		//File f = new File("draft.txt");
 	 File f = new File("input.txt");
		try {
			k = new Scanner(f);
			capacity = k.nextInt();
			weight = new int[capacity + 1];
			value = new int[capacity + 1];

			for (int c = 0; c < weight.length; c++)
				weight[c] = k.nextInt();

			for (int c = 0; c < value.length; c++)
				value[c] = k.nextInt();

			total = k.nextInt();

			// for(int c=0;c<weight.length;c++)
			// {
			// System.out.println(total);
			// }

		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			System.out.println(e);
		}
	}
}
